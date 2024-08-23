@props([
    'sortable' => null,
    'direction' =>null
])
<th {{  $attributes->merge(['class'=>'px-6 py-3 bg-slate-50'])->only('class') }}>
    @unless ($sortable)
      <div class=" text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $slot }}</div>
    @else
        <button class="flex text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" wire:click="sort('{{ $sortable }}')">
            {{ $slot }}
            @if ($direction !== null)
            @if ($direction === 'asc')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-1 w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-1 w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            @endif
            @endif
        </button>
    @endunless
</th>
