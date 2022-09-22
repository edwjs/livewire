<?php

namespace App\Http\Livewire\Todo;

use App\Http\Livewire\Todo as LivewireTodo;
use App\Models\Todo;
use App\Rules\Auth;
use Livewire\Component;

class Item extends Component
{
    public Todo $todo; // alread hydrates the object 
    public string $title = '';

    // rule validation
    public function rules () {
        return [
            'todo.checked' => ['boolean', new Auth],
        ];
    }
    public function render()
    {
        return view('livewire.todo.item');
    }

    public function updatingTodo()
    {
        $this->validate();
    }

    // when the todo model updated, the method is run
    public function updatedTodo()
    {   
        $this->validate();
        
        $this->todo->save();

        // emit events to Todo Component
        $this->emitTo(LivewireTodo::class, 'todo::refresh-list');

        $this->emit('notification', [
            'type' => 'info',
            'message' => 'Todo updated.',
        ]);
    }
}
