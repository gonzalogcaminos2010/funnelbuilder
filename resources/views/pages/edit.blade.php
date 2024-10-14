@extends('layouts.app')

@section('title', 'Editar Página')

@section('content')
    <div class="max-w-7xl mx-auto py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Editar Página: {{ $page->title }}</h2>

        <div id="gjs" style="height: 500px; border: 1px solid #ddd;">{!! $page->content !!}</div>

        <form action="{{ route('pages.update', [$funnel, $page]) }}" method="POST" id="page-form">
            @csrf
            @method('PUT')
            <input type="hidden" name="content" id="content">

            <div class="mt-6">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/grapesjs@0.18.4/dist/grapes.min.js"></script>
    <link href="https://unpkg.com/grapesjs@0.18.4/dist/css/grapes.min.css" rel="stylesheet">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editor = grapesjs.init({
                container: '#gjs',
                fromElement: true,
                height: '500px',
                width: 'auto',
                storageManager: false,
                panels: { defaults: [] },
                blockManager: {
                    appendTo: '#blocks',
                },
            });

            // Guardar el contenido del editor en el input oculto antes de enviar el formulario
            const form = document.getElementById('page-form');
            form.addEventListener('submit', function () {
                document.getElementById('content').value = editor.getHtml();
            });
        });
    </script>
@endsection
