<x-guest-layout>
    <div class="flex justify-between p-5 items-center">
        <div class="text-xl text-gray-500">Organisations</div>
        <div>Search</div>
        <div><a href="{{ route('organisations.create') }}">Create</a></div>
    </div>
    <x-table>
        <x-slot name="head">
            <x-table.header>Logo</x-table.header>
            <x-table.header>Name</x-table.header>
            <x-table.header>Email</x-table.header>
            <x-table.header>Phone</x-table.header>
        </x-slot>
        <x-slot name="body">
            @forelse($data as $organisation)
            <x-table.row>
                <x-table.cell><img src="{{ $organisation->logo }}" alt="{{ $organisation->name }}" class="h-40" /></x-table.cell>
                <x-table.cell>{{ $organisation->name }}</x-table.cell>
                <x-table.cell>{{ $organisation->email }}</x-table.cell>
                <x-table.cell>{{ $organisation->phone }}</x-table.cell>
            </x-table.row>
            @empty
            <x-table.row>
                <x-table.cell colspan="3" class="p-4 text-gray-400">No results found</x-table.cell>
            </x-table.row>
            @endforelse
        </x-slot>
    </x-table>
    {{ $data->links() }}

</x-guest-layout>