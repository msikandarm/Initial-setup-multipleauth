<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class UserTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')
                ->searchable()
                ->sortable(),
            Column::make(__('Username'), 'username')
                ->searchable()
                ->sortable(),
            Column::make(__('Email'), 'email')
                ->searchable()
                ->sortable(),
            Column::make(__('Role'))
                ->label(
                    fn ($row) => $row->roles->first()?->name
                ),
            Column::make(__('Created at'), 'created_at')
                ->sortable(),
            Column::make(__('Action'))
                ->label(
                    fn ($row) => view('admin.users.actions')->withRow($row)
                ),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make(__('Role'))
                ->options(
                    user_roles()
                        ->keyBy('id')
                        ->map(fn ($role) => $role->name)
                        ->prepend(__('Any'), '')
                        ->toArray()
                )
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereRelation('roles', 'id', $value);
                }),
        ];
    }

    public function builder(): Builder
    {
        return User::query()
            ->where('id', '>', 1)
            ->with('roles');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['id'])
            ->setDefaultSort('name', 'asc')
            ->setPerPageAccepted([25, 50, 100])
            ->setTableAttributes([
                'default' => true,
                'class' => 'table-bordered table-lg',
            ])
            ->setThAttributes(function (Column $column) {
                if ($column->isField('created_at')) {
                    return [
                        'width' => '185px',
                    ];
                }

                if ($column->getTitle() === __('Action')) {
                    return [
                        'class' => 'text-center',
                        'width' => '150px',
                    ];
                }

                return [];
            });
    }
}
