<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ trans_choice('models/video.module', 2) }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                <div class="relative w-full">
                    <x-input wire:model.live="searchVideo" type="text" id="simple-search"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Search Video..." required=""/>
                </div>
                <!-- Show Modal -->
                @include('user.video.modal-show')

                <table class="mt-4 table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">@lang('models/video.fillable.id')</th>
                        <th class="px-4 py-2">@lang('models/video.fillable.label')</th>
                        <th class="px-4 py-2">@lang('general.table.columns.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($videos as $key => $item)
                        <tr>
                            <td class="border px-4 py-2">{{ ($key + 1) }}</td>
                            <td class="border px-4 py-2">{{ $item->label }}</td>
                            <td class="border px-4 py-2">
                                <x-secondary-button wire:click="openModal('{{ $item->id }}')" class="bg-blue-600">
                                    @lang('general.actions.show')
                                </x-secondary-button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4 text-sm text-center" colspan="3">
                                No se ha encontrado ningún vídeo.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

