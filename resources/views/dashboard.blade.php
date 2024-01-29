<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-4 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($videos as $key => $item)
                <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <h1 class="text-2xl font-medium text-gray-900">
                        {{ $item->label }}
                    </h1>
                    <p class="mt-2 text-gray-500 leading-relaxed">
                        Visualizaciones: <strong> {{ $item->audit()->count() }}</strong>
                    </p>
                </div>
            @empty
                <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <p class="mt-2 text-gray-500 leading-relaxed">
                        No se ha encontrado ningún vídeo.
                    </p>
                </div>
            @endforelse
        </div>
        <div class="mt-2">
            {{ $videos->links() }}
        </div>
    </div>
</div>

