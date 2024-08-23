@props([
    'placeholder' => null,
    'trailingAddOn' => null,
])

<div class="flex">
  <select {{ $attributes->merge(['class' => 'block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 rounded-lg focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 text-slate-500' . ($trailingAddOn ? ' rounded-r-none' : '')]) }}>
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    {{ $slot }}
  </select>

  @if ($trailingAddOn)
    {{ $trailingAddOn }}
  @endif
</div>
