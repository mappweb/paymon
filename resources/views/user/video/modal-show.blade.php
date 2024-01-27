<x-dialog-modal wire:model.live="flagOpenModal">
    <x-slot name="title">
        @lang('models/video.actions.show')
    </x-slot>
    <x-slot name="content">
        <div class="aspect-video">
            <iframe class="w-full h-full" height="315"
                    src="{{ $url }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
            </iframe>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-button wire:click="$toggle('flagOpenModal')" wire:loading.attr="disabled">
            @lang('general.actions.close')
        </x-button>
    </x-slot>
</x-dialog-modal>
