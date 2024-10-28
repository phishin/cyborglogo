---
pagination:
    collection: posts
---
@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->siteName }} News" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="The list of news posts for {{ $page->siteName }}" />
@endpush

@section('body')
    <x-container class="py-20">
        <blog :posts="{{ $pagination->items->first()->items }}" :per-page="5"></blog>
    </x-container>
@stop
