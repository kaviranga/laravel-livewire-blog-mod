<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SortableTable extends Component
{
    //

    public $sortField = 'id';  // Default sort field
    public $sortDirection = 'asc';  // Default sort direction
    public $search = '';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        // $data = User::orderBy($this->sortField, $this->sortDirection)->get();

        // return view('livewire.sortable-table', [
        //     'data' => $data,
        // ]);
        $data = User::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();

        return view('livewire.sortable-table', [
            'data' => $data,
            'sortField' => $this->sortField,
            'sortDirection' => $this->sortDirection,
        ]);
    }
}
