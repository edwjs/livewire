<?php

namespace App\Http\Livewire\Todo;

use App\Http\Livewire\Todo;
use App\Models\Todo as ModelsTodo;
use App\Rules\Auth;
use Livewire\Component;

class Create extends Component
{    
    public string $title = '';

    public function render()
    {
        return view('livewire.todo.create');
    }

    public function save()
    {
        $this->validate([
            'title' => [new Auth(), 'required', 'min:3'],
        ]);

        ModelsTodo::query()->create(['title' => $this->title, 'user_id' => auth()->user()->id]);

        $this->reset('title'); // clear input

        $this->emitTo(Todo::class, 'todo::refresh-list');

        $this->emit('notification', [
            'type' => 'success',
            'message' => 'Todo created.',
        ]);
    }
}
