<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de notas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    

                @forelse($notes as $note)
                    <div class="mb-4 p-4 border border-gray-300">
                        <h3>{{ $note->titulo }}</h3>
                            <div class="flex items-center space-x-4">
                                {{ $note->descripcion }} 
                                - <a href="{{ route('notes.show', $note->id) }}">Ver</a> 
                                - <a href="{{ route('notes.edit', $note->id) }}">Editar</a> 
                                - <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input style="cursor: pointer" type="submit" value="Eliminar">
                                    </form> 
                            </div>
                                                
                    </div>
                @empty
                    <p>{{ __('No hay notas disponibles.') }}</p>
                @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
