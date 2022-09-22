<div>
    <input type="text" 
            class="p-4 text-white text-xl bg-gray-800 w-full focus:outline-none focus:border-0" 
            placeholder="When you are done. Hit enter..."
            wire:model.defer="title"
            wire:keydown.enter="save">

    @error('title')
        <div class="m-2 text-red-500 bg-red-100 opacity-90 border-4 border-red-400 rounded-lg p-4 text-xl tracking-wide">
            {{ $message }}
        </div>        
    @enderror
</div>
