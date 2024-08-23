<x-guest-layout>
    Welcome to the home page
    <div class="flex gap-4">
        <x-card slim>
            <x-slot:heading>
                <h3 class="text-xl font-bold">Skateboards</h3>
                </x-slot>
                <x-slot:body>Shop out line of custom-made skate decks. Each deck is hand-crafted from lumber grown in Loompa Land.</x-slot>
                    <x-slot:footer class="flex-col">
                        <button class="rounded-lg bg-blue-500 text-white px-4 py-2 w-full">Shop Now</button>
                        <button class="rounded-lg bg-blue-500 text-white px-4 py-2 w-full">Shop Later</button>
                        </x-slot>
        </x-card>
    </div>
</x-guest-layout>