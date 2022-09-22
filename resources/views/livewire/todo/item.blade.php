<div class="flex justify-between items-center">

    <label class="flex justify-start items-center @if ($todo->checked) opacity-30 @endif">

        <div class="border-2 rounded-full border-purple-700 w-12 h-12 
                    flex flex-shrink-0 justify-center items-center mr-2
                    focus-within:border-blue-500
                    @if ($todo->checked) bg-yellow-500 @else bg-gray-800 @endif">

            {{-- <input type="checkbox" class="opacity-0 absolute" @if ($todo->checked) checked @endif> --}}
            {{-- @if (auth()->check() && auth()->user()->can('update', $todo)) --}}
                <input type="checkbox" class="opacity-0 absolute" wire:model="todo.checked">                
            {{-- @endif --}}

            @if ($todo->checked)                
                <svg xmlns="http://www.w3.org/2000/svg" class=" w-8 h-8 text-gray-800 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>               
            @endif
        </div>

        <div class="
                select-none text-xl text-gray-50 tracking-wider
                @if ($todo->checked) line-through @else @endif
            ">
            {{ $todo->title }}
            <p class="text-lg text-gray-400">created by: {{ $todo->user->name }}</p>
        </div>        

    </label>
    
    @livewire('todo.delete', ['todo' => $todo], key($todo->id.'-delete'))

</div>
