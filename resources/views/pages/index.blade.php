@extends('layouts.app')

@section('title', 'Páginas del Funnel')

@section('content')
    <div class="max-w-7xl mx-auto py-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Páginas del Funnel: {{ $funnel->name }}</h2>
            <a href="{{ route('pages.create', $funnel) }}" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                Crear Nueva Página
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if ($funnel->pages->isEmpty())
            <p class="text-gray-600">No hay páginas creadas para este funnel. ¡Empieza creando una nueva página!</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($funnel->pages as $page)
                    <div class="bg-white p-6 rounded-md shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $page->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($page->content, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('pages.edit', [$funnel, $page]) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('pages.destroy', [$funnel, $page]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection