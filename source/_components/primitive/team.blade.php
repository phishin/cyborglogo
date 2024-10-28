<?php
// Simple team section that has two
// categories by default. Utilizes
// Alpine.js and Tailwindcss
?>

@props([
    'class' => null,
    'team' => null,
    'title' => null,
])

<section x-data="{active: 0}" class="py-32 {{ $class }}">
    <div class="md:4/5 w-mobile mx-auto">
        <div class="flex lg:flex-row flex-col gap-4 justify-between items-center mb-10">
            <p class="text-2xl text-brand-400">{{ $title }}</p>
            <div class="flex">
                <button class="text-sm px-8 py-4 rounded-l-32 transition" x-on:click="active = 0" x-bind:class="active == 0 ? 'bg-brand-dark text-white' : 'bg-brand-grey-100 text-brand-dark'">Board of Directors</button>
                <button class="text-sm px-8 py-4 rounded-r-32 transition" x-on:click="active = 1" x-bind:class="active == 1 ? 'bg-brand-dark text-white' : 'bg-brand-grey-100 text-brand-dark'">Business Development Board</button>
            </div>
        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-6">
            @foreach($team as $item)
                <div x-show="'{{$item->category}}' == active">
                    <x-primitive.image class="rounded" src="{{$item->image}}" alt="{{$item->name}}"/>
                    <div class="mt-4">
                        <p class="text-lg text-brand-dark mb-1">{!! $item->name !!}</p>
                        <p class="text-sm">{!! $item->text !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>