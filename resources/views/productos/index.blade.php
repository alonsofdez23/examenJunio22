<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Compra
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <div class="flex flex-col items-center mt-4">
                        <!-- Variable Session -->
                        @if (session()->has('error'))
                            <div class="bg-red-100 p-4 mb-4 text-sm text-red-700" role="alert">
                                <span class="font-semibold">{{ session('error') }}</span>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="bg-green-100 p-4 mb-4 text-sm text-green-700" role="alert">
                                <span class="font-semibold">{{ session('success') }}</span>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('productos.store') }}">
                            @csrf
                            @method('POST')

                            <div>
                                <x-label for="codigo" value="Código" />

                                <x-input
                                id="codigo"
                                class="block mt-1 w-full"
                                type="text"
                                name="codigo"
                                placeholder="1234567890123"
                                value="{{ old('codigo') }}"
                                autofocus />
                                @error('codigo')
                                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="flex justify-center mt-4 mb-4">
                                <x-button>
                                    Añadir producto a la compra
                                </x-button>
                            </div>
                        </form>
                    </div>

                    @if (!empty($productos))
                            <div class="border border-gray-200 shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Denominación</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                        <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit/Delete</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach ($productos as $producto)
                                            <tr class="whitespace-nowrap">
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $producto['codigo'] }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $producto['denominacion'] }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $producto['precio'] }}
                                                    </div>
                                                </td>
                                                {{-- <td class="px-6 py-4 inline-flex">
                                                    <form action="{{ route('productos.destroy', $linea) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="py-1 px-4 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded text-sm text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Borrar</button>
                                                    </form>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="flex justify-center mt-4 mb-4 font-semibold text-xl text-gray-800 leading-tight">
                                    Subtotal: {{ $subtotal }}€
                                </div>

                                <div class="flex justify-between m-6">
                                    <form action="{{ route('productos.alldestroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button  class="bg-red-600 hover:bg-red-500">
                                            Anular compra
                                        </x-button>
                                    </form>
                                    <form action="{{ route('productos.ticket') }}" method="GET">
                                        @csrf
                                        <x-button>
                                            Finalizar compra
                                        </x-button>
                                    </form>
                                </div>

                                @else
                                <div class="bg-green-100 rounded-lg p-4 mt-4 mb-4 text-sm text-green-700 w-96 text-center" role="alert">
                                    Carrito vacío
                                </div>
                            </div>
                        @endif

                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
