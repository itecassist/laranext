@if ($errors->any())
<div {{ $attributes }}>
    <div class="font-thin text-rose-500">{{ __('Whoops! Something went wrong.') }}</div>

    <ul class="mt-3 list-disc list-inside text-sm text-rose-400">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif