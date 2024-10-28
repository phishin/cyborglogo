<?php
// This dialog component utilizes alpinejs. Check dialog.js for the button trigger function.
// The id must match the data-dialog value of the button that opens it. You can
// place any content in the slot variable to show up in the popup.
?>

@props([
    'class' => null,
    'id' => null,
])

<div id="{{ $id }}" class="fixed hidden-dialog top-0 bottom-0 right-0 left-0 m-auto background grid overflow-auto">
    <svg x-on:click="document.querySelector('#' + id)?.classList.remove('show-dialog'); show = false" xmlns="http://www.w3.org/2000/svg" class="absolute top-2 right-2 cursor-pointer" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <line x1="18" y1="6" x2="6" y2="18" />
        <line x1="6" y1="6" x2="18" y2="18" />
    </svg>

    <section class="rounded-10 overflow-hidden p-0 m-auto h-fit {{ $class }}" x-data="{ id: '{{ $id }}' }">
        <div x-on:click.outside="document.querySelector('#' + id)?.classList.remove('show-dialog'); show = false" class="bg-white rounded h-fit show-dialog__card card">
            <div>
                {{ $slot }}
            </div>
        </div>
    </section>
</div>