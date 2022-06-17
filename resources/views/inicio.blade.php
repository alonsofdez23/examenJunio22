<x-guest-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">

                    <div class="flex justify-center">
                        <a href="{{ route('productos.index') }}">
                            <x-button>
                                Empezar compra
                            </x-button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
