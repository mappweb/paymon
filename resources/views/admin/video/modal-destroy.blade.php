<x-confirmation-modal wire:model.live="flagOpenConfirmationModal">
    <x-slot name="title">
        @lang('models/video.actions.destroy')
    </x-slot>

    <x-slot name="content">
        @lang('general.messages.delete', ['model' => 'vídeo'])
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$toggle('flagOpenConfirmationModal')" wire:loading.attr="disabled">
            @lang('general.actions.cancel')
        </x-secondary-button>

        <x-danger-button class="ms-3" wire:click="destroy" wire:loading.attr="disabled">
            @lang('general.actions.delete')
        </x-danger-button>
    </x-slot>
</x-confirmation-modal>
