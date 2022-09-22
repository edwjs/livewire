<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pinguim do Laravel | Livewire</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

        </style>

        @livewireStyles

    </head>
    <body class="bg-gray-800">
                
        <div class="flex space-x-4">
        
            <div class="w-1/4 space-y-4 text-2xl">
                <div class="block w-full bg-gray-600 py-1 px-4">
                    {{-- Logged as: {{ auth()->user()?->name ?: 'Guest' }} --}}
                    Logged as: {{ auth()->user()->name ?? 'Guest' }}
                </div>
    
                @livewire('login', ['with' => 1])
                @livewire('login', ['with' => 2])            
                @livewire('logout')
    
                <div class="h-10">   
                    @livewire('offline')
                </div>
                
                @livewire('notification')
                
            </div>
    
            <div class="flex space-x-5 w-full">
                {{ $slot }}
            </div>
        </div>
        
        @livewireScripts
    </body>
</html>
