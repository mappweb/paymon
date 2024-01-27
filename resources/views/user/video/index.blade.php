<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ trans_choice('models/video.module', 2) }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

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
                    @foreach($videos as $key => $item)
                        <tr>
                            <td class="border px-4 py-2">{{ ($key + 1) }}</td>
                            <td class="border px-4 py-2">{{ $item->label }}</td>
                            <td class="border px-4 py-2">
                                <x-secondary-button wire:click="openModal('{{ $item->id }}')" class="bg-blue-600">
                                    @lang('general.actions.show')
                                </x-secondary-button>
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

