<div class="mt-1 relative rounded-md shadow-sm">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm sm:leading-5">
            R
        </span>
    </div>

    <input {{ $attributes }} class="block w-full pl-7 pr-12 sm:text-sm sm:leading-5 rounded-lg border-gray-300 text-slate-500" placeholder="0.00" aria-describedby="price-currency">

    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
            ZAR
        </span>
    </div>
</div>
