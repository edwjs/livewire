<label for="{{ $attributes->get('id') }}" 
    class="cursor-pointer mt-1 w-2/16 mx-1 rounded w-full flex justify-center hover:text-white
         {{ $attributes->get('value') == $attributes->get('filter') ? 'text-white' : 'text-gray-400' }}  
         {{ $attributes->get('value') == $attributes->get('filter') ? 'bg-purple-600' : 'bg-gray-800' }}">
 <input type="radio" {{ $attributes }} class="appearance-none">
 <span class="text-lg">{{ $slot }}</span>
</label>