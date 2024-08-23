@props([
'leadingAddOn' => false,
])

<div class="flex">
    @if ($leadingAddOn)
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        {{ $leadingAddOn }}
    </span>
    @endif

    <input {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-1.5 text-slate-500' . ($leadingAddOn ? ' rounded-none rounded-r-md' : '')]) }} />
</div>
