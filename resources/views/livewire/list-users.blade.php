
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="w-full">
                <thead class="bg-white border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        #
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Name
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        E-mail
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Roles
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->users as $user)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user->id}}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$user->name}}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$user->email}}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                @foreach ($user->roles as $role)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $role->title }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <x-jet-secondary-button>
                                    {{ __('Edit') }}
                                </x-jet-secondary-button>

                                <x-jet-danger-button wire:click="confirmingUserDeletion({{ $user->id }})" class="ml-3">
                                    {{ __('Delete') }}
                                </x-jet-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="openModalDelete">
        <x-slot name="title">
            {{ __('Please Confirm') }}
        </x-slot>

        <x-slot name="content">
            @if ($userToRemove)
                <p>Are you sure you want to delete <b class="capitalize">{{ $userToRemove->name }}</b>?</p>
            @endif


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('openModalDelete')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="remove" wire:loading.attr="disabled">
                {{ __('Yes, I´m sure!') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>

