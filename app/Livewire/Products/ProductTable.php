<?php

namespace App\Livewire\Products;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;

class ProductTable extends DataTableComponent
{
    public $editModalName;
    public $deleteModalName;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSingleSortingDisabled();
        $this->setDefaultSort('name', 'asc');
    }

    public function builder(): Builder
    {
        return Product::query()->whereNot('id', auth()->user()->id);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Price", "price")
                ->sortable(),
            Column::make("Description", "description")
                ->deselected()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            // Column::make('Actions', 'id')
            //     ->excludeFromColumnSelect()
            //     ->label(
            //         fn ($row, Column $column) => view('components.datatables.button-container', [
            //             'rowId' => $row['id'],
            //             'isEdit' => true,
            //             'editModalName' => $this->editModalName,
            //             'isDelete' => false,
            //             'deleteModalName' => $this->deleteModalName,
            //             'isRestore' => false,
            //             'restoreModalName' => '',
            //         ])
            //     ),
        ];
    }
}
