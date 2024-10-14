@extends('layouts.app')

@section('title', 'Crear Nuevo Funnel')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md mt-8">
        <h2 class="text-3xl font-bold mb-6 text-center">Crear Nuevo Funnel</h2>

        <form action="{{ route('funnels.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre del Funnel:</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Descripción:</label>
                <textarea name="description" id="description" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                    Guardar Funnel
                </button>
            </div>
        </form>
    </div>
@endsection
