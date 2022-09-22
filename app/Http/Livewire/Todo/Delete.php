<?php

namespace App\Http\Livewire\Todo;

use App\Http\Livewire\Todo as LivewireTodo;
use App\Models\Todo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Delete extends Component
{
    use AuthorizesRequests;

    public Todo $todo;

    public function render()
    {
        return view('livewire.todo.delete');
    }

    public function destroy()
    {
        if (!auth()->check() || !auth()->user()->can('delete', $this->todo)) {
            $this->emit('notification', [
                'type' => 'warning',
                'message' => "You can't delete this task. Because you are not a owner of this task. <br> {$this->todo->title}",
            ]);
            
            return;
        }
        
        // $this->authorize('delete', $this->todo);        
        $this->todo->delete();
        $this->emitTo(LivewireTodo::class, 'todo::refresh-list');
    }
}
