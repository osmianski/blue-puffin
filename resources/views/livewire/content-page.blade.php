@php
    /* @see \App\Http\Livewire\ContentPage */
@endphp
<article class="prose max-w-full">
    @can('update', $page)
        Editor goes here
    @else
        <h1>{{ $title }}</h1>
    @endcan

    @foreach($nodes as $node)
        <x-dynamic-component :component="'node.' . ($node->type?->value ?? 'paragraph')" :node="$node"/>
    @endforeach
</article>
