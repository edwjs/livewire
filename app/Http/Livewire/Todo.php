<?php

namespace App\Http\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    use WithPagination;

    public string $filter = 'all';

    // query string url
    protected $queryString = ['filter' => ['except' => 'all']];

    // event listeners
    protected $listeners = [
        'todo::refresh-list' => '$refresh',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.todo');
    }

    public function getTodosProperty()
    {
        return ModelsTodo::query()
            ->when($this->filter == 'done', fn ($query) => $query->where('checked', true))
            ->when($this->filter == 'pending', fn ($query) => $query->where('checked', false))
            ->orderBy('checked')
            ->paginate(5);
            // ->get();
    }

    public function getAllProperty()
    {
        return ModelsTodo::query()->count();
    }

    public function getPendingProperty()
    {
        return ModelsTodo::query()->whereChecked(false)->count();
    }

    public function getDoneProperty()
    {
        return ModelsTodo::query()->where('checked', true)->count();
    }
}
