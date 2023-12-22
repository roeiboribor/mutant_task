<?php

namespace App\Livewire\Users;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

class UserTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return User::query()->whereNot('id', auth()->user()->id);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make('Actions', 'id')
                ->excludeFromColumnSelect()
                ->label(
                    fn ($row, Column $column) => view('components.datatables.button-container', [
                        'rowId' => $row->id,
                        'isEdit' => true,
                        'editModalName' => 'edit-user',
                        'isDelete' => true,
                        'deleteModalName' => 'confirm-user-deletion',
                        'isRestore' => false,
                        'restoreModalName' => '',
                    ])
                ),
        ];
    }
}
