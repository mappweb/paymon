<x-dialog-save-modal action="save" wire:model.live="flagOpenModal">
    <x-slot name="title">
        @if(is_null($video['id']))
            @lang('models/video.actions.create')
        @else
            @lang('models/video.actions.edit')
        @endif
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
            @lang('general.actions.cancel')
        </x-secondary-button>

        <x-button class="ms-3" type="submit" wire:loading.attr="disabled">
            @lang('general.actions.save')
        </x-button>
    </x-slot>
</x-dialog-save-modal>
