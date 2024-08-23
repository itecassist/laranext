@props(['heading'=>'Some default heading', 'slim'=>false])
<div class="grid gap-2 rounded-xl bg-gray-100 max-w-sm p-5">
    <div class="pb-2">
        @if ($heading instanceof \Illuminate\View\ComponentSlot)
        {{ $heading }}
        @else
        {{ $heading }}
        @endif
    </div>

    <div class="text-sm text-gray-700">
        <p>{{ $body }}</p>
    </div>

    <div class="pt-8 pb-2">
        <x-separator class="!bg-gray-200" />
    </div>

    <div {{ $footer->attributes->class(['flex gap-2']) }}>
        {{ $footer }}
    </div>
</div>