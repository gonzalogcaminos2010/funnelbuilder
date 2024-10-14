@extends('layouts.app')

@section('title', 'Mis Funnels')

@section('content')
    <div class="max-w-7xl mx-auto py-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Mis Funnels</h2>
            <a href="{{ route('funnels.create') }}" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                Crear Nuevo Funnel
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if ($funnels->isEmpty())
            <p class="text-gray-600">Aún no has creado ningún funnel. ¡Empieza creando uno nuevo!</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($funnels as $funnel)
                    <div class="bg-white p-6 rounded-md shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $funnel->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $funnel->description }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('funnels.show', $funnel) }}" class="text-blue-600 hover:underline">Ver Detalles</a>
                            <form action="{{ route('funnels.destroy', $funnel) }}" method="POST">
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