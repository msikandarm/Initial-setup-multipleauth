<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RoleTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')
                ->searchable()
                ->sortable(),
            Column::make(__('Last updated'), 'updated_at')
                ->sortable(),
            Column::make(__('Action'))
                ->label(
                    fn ($row) => view('admin.roles.actions')->withRow($row)
                ),
        ];
    }

    public function builder(): Builder
    {
        return Role::query();
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['id', 'is_primary'])
            ->setDefaultSort('name', 'asc')
            ->setPerPageAccepted([25, 50, 100])
            ->setTableAttributes([
                'default' => true,
                'class' => 'table-bordered table-lg',
            ])
            ->setThAttributes(function (Column $column) {
                if ($column->isField('updated_at')) {
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
