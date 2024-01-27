<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Videos') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                <p class="text-gray-500 leading-relaxed">
                    <x-button wire:click="openModal" wire:loading.attr="disabled" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Post</x-button>
                </p>

                <!-- Delete User Confirmation Modal -->
                <x-dialog-modal action="createVideo" wire:model.live="flagOpenModal">
                    <x-slot name="title">
                        {{ __('Create Video') }}
                    </x-slot>
                    <x-slot name="content">
                        <div>
                            <x-label for="label" value="{{ __('Label') }}"/>
                            <x-input wire:model="video.label" id="label" class="block mt-1 w-full" type="text" name="label"
                                     :value="old('user.label')" autofocus autocomplete="label"/>
                            <x-input-error for="video.label" />
                        </div>

                        <div>
                            <x-label for="url" value="{{ __('Url') }}"/>
                            <x-input wire:model="video.url" id="url" class="block mt-1 w-full" type="text" name="url"
                                     :value="old('video.url')" autofocus autocomplete="url"/>
                            <x-input-error for="video.url" />
                        </div>

                    </x-slot>

                    <x-slot name="footer">
                        <x-secondary-button wire:click="$toggle('flagOpenModal')" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-button class="ms-3" type="submit" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                </x-dialog-modal>

                <table class="mt-4 table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Label</th>
                        <th class="px-4 py-2">Url</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $key => $item)
                        <tr>
                            <td class="border px-4 py-2">{{ ($key + 1) }}</td>
                            <td class="border px-4 py-2">{{ $item->label }}</td>
                            <td class="border px-4 py-2">{{ $item->url }}</td>
                            <td class="border px-4 py-2">
                                <x-secondary-button wire:click="edit('{{ $item->id }}')" class="bg-blue-600">
                                    Edit
                                </x-secondary-button>
                                <x-button class="bg-red-600">Delete</x-button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $videos->links() }}
            </div>
        </div>
    </div>
</div>

