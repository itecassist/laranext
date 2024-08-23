<div>
    <form>
        <div class="flex justify-between p-5 items-center">
            <div class="text-xl text-gray-500">Create Organisation</div>
        </div>
        <div class="p-5">
            <div class="mb-5">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
    </form>
</div>