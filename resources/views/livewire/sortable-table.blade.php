<table class="min-w-full divide-y divide-gray-200 border border-gray-300" cellpadding="10">
    <thead class="bg-gray-100">
        <tr>
            <th wire:click="sortBy('id')" class="px-4 py-2 cursor-pointer">
                ID @include('livewire.partials._sort-icon', ['field' => 'id'])
            </th>
            <th wire:click="sortBy('name')" class="px-4 py-2 cursor-pointer">
                Name @include('livewire.partials._sort-icon', ['field' => 'name'])
            </th>
            <th wire:click="sortBy('email')" class="px-4 py-2 cursor-pointer">
                Email @include('livewire.partials._sort-icon', ['field' => 'email'])
            </th>
            <th wire:click="sortBy('email_verified_at')" class="px-4 py-2 cursor-pointer">
                Verified @include('livewire.partials._sort-icon', ['field' => 'email_verified_at'])
            </th>
            <th wire:click="sortBy('created_at')" class="px-4 py-2 cursor-pointer">
                Created @include('livewire.partials._sort-icon', ['field' => 'created_at'])
            </th>
            <th wire:click="sortBy('updated_at')" class="px-4 py-2 cursor-pointer">
                Updated @include('livewire.partials._sort-icon', ['field' => 'updated_at'])
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($data as $user)
            <tr>
                <td class="px-4 py-2">{{ $user->id }}</td>
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">
                    {{ $user->email_verified_at ? $user->email_verified_at->format('Y-m-d H:i') : 'Not Verified' }}
                </td>
                <td class="px-4 py-2">{{ $user->created_at->format('Y-m-d') }}</td>
                <td class="px-4 py-2">{{ $user->updated_at->format('Y-m-d') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
