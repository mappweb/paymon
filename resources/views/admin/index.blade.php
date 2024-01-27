<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ trans_choice('models/video.module', 2) }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                <p class="text-gray-500 leading-relaxed">
                    <x-button wire:click="openCreateModal" wire:loading.attr="disabled"
                              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                        @lang('general.actions.create')
                    </x-button>
                </p>

                <!-- Create Or Edit Modal -->
                @include('admin.modal-save')

                <!-- Delete Modal -->
                @include('admin.modal-destroy')

                <table class="mt-4 table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">@lang('models/video.fillable.id')</th>
                        <th class="px-4 py-2">@lang('models/video.fillable.label')</th>
                        <th class="px-4 py-2">@lang('models/video.fillable.url')</th>
                        <th class="px-4 py-2">@lang('general.table.columns.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $key => $item)
                        <tr>
                            <td class="border px-4 py-2">{{ ($key + 1) }}</td>
                            <td class="border px-4 py-2">{{ $item->label }}</td>
                            <td class="border px-4 py-2">{{ $item->url }}</td>
                            <td class="border px-4 py-2">
                                <x-secondary-button wire:click="openEditModal('{{ $item->id }}')" class="bg-blue-600">
                                    @lang('general.actions.edit')
                                </x-secondary-button>
                                <x-button wire:click="openDestroyModal('{{ $item->id }}')" class="bg-red-600">
                                    @lang('general.actions.delete')
                                </x-button>
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

