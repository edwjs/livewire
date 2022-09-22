@props([
    'type'
])

<div {{ $attributes->class([
    'p-3 tracking-wide',
    'bg-blue-300 text-blue-900' => $type == 'info',
    'bg-yellow-300 text-yellow-900' => $type == 'warning',
    'bg-red-300 text-red-900' => $type == 'error',
    'bg-green-300 text-green-900' => $type == 'success',
]) }}>
    {{ $slot }}
</div>