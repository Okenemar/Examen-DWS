<!-- resources/views/mensajes/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Mensajes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <table class="min-w-full border border-gray-300">
                        <thead>
                            <tr>
                                <th class="bg-gray-800 text-white p-2 text-center">ID</th>
                                <th class="bg-gray-800 text-white p-2 text-center">Mensaje</th>
                                <th class="bg-gray-800 text-white p-2 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mensajes as $mensaje)
                            <tr>
                                <td class="border p-2 text-center">{{ $mensaje->id }}</td>
                                <td class="border p-2 text-center">{{ $mensaje->mensaje }}</td>
                                <td class="border p-2 flex items-center space-x-2 justify-center">
                                    <a href="{{ route('mensajes.editar', ['mensaje' => $mensaje]) }}"
                                       class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded">
                                        Editar
                                    </a>
                                    <form action="{{ route('mensajes.eliminar', ['mensaje' => $mensaje]) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
