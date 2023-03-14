<article class="prose max-w-full">
    <h1>{{ $title ?? __('Untitled') }}</h1>

    @foreach($nodes as $node)
        <x-dynamic-component :component="'node.' . ($node->type?->value ?? 'paragraph')" :node="$node"/>
    @endforeach
</article>
