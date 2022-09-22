<div class="mx-auto overflow-hidden mt-10 shadow-lg mb-2 bg-gray-900 border-4 rounded-lg border-gray-400 w-full">    
    <div>
        <div class="p-5 text-white text-center text-3xl bg-gray-900">
            PDL | <span class="text-yellow-500">Todo</span> App
        </div>
    </div>

    @livewire('todo.create')

    <div class="text-white text-2xl flex justify-between items-center">
        <x-todo.filter :filter="$filter" wire:model="filter" id="filter_all" name="filter" value="all">
            ({{ $this->all }}) All
        </x-todo.filter>
        <x-todo.filter :filter="$filter" wire:model="filter" id="filter_pending" name="filter" value="pending">
            ({{ $this->pending }}) Pending
        </x-todo.filter>
        <x-todo.filter :filter="$filter" wire:model="filter" id="filter_done" name="filter" value="done">
            ({{ $this->done }}) Done
        </x-todo.filter>            
    </div>

    <div class="p-5 space-y-5">
        @foreach ($this->todos as $todo)
            @livewire('todo.item', ['todo' => $todo], key($todo->id))
        @endforeach
        
        {{ $this->todos->links() }}
    </div>
</div>

