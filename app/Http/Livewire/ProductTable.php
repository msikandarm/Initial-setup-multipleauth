<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make(__('Title'), 'title')
                ->searchable()
                ->sortable(),
                Column::make(__('Category'), 'category.title')
                ->searchable()
                ->sortable(),
            Column::make(__('Action'))
                ->label(
                    fn ($row) => view('admin.products.actions')->withRow($row)
                ),
        ];
    }

    public function builder(): Builder
    {
        return Product::query();
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['products.id'])
            ->setDefaultSort('title', 'asc')
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
                        'width' => '250px',
                    ];
                }

                return [];
            });
    }
}
