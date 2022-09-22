<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $type;
    public $message;

    protected $listeners = ['notification' => 'notify'];

    public function render()
    {
        return view('livewire.notification');
    }

    public function notify($props)
    {
        $this->message = $props['message'];
        $this->type = $props['type'];
    }
}
