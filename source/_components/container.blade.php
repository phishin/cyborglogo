@props([
    'class' => null
])

<div class="md:w-4/5 w-mobile mx-auto {{ $class }}">
    {{ $slot }}
</div>