<?php

namespace BweLivewireDatatables\Components;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public string $table;

    public array $columns = [];

    public string $search = '';

    public string $sortField = 'id';

    public string $sortDirection = 'asc';

    public int $perPage = 10;

    public function mount(
        string $table,
        array $columns
    ): void {
        $this->table = $table;
        $this->columns = $columns;

        $this->perPage = config(
            'datatable.per_page',
            10
        );
    }

    public function sort(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection =
                $this->sortDirection === 'asc'
                    ? 'desc'
                    : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = DB::table($this->table);

        if ($this->search) {
            $query->where(function ($q) {
                foreach ($this->columns as $column) {
                    if (!empty($column['searchable'])) {
                        $q->orWhere(
                            $column['field'],
                            'like',
                            '%' . $this->search . '%'
                        );
                    }
                }
            });
        }

        $rows = $query
            ->orderBy(
                $this->sortField,
                $this->sortDirection
            )
            ->paginate($this->perPage);

        return view(
            'datatable::livewire.data-table',
            [
                'rows' => $rows,
            ]
        );
    }
}