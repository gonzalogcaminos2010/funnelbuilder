@extends('layouts.app')

@section('title', 'Crear Nueva Página')

@section('content')
    <div class="max-w-7xl mx-auto py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Crear Nueva Página para el Funnel: {{ $funnel->name }}</h2>

        <div id="gjs" style="height: 500px; border: 1px solid #ddd;"></div>

        <form action="{{ route('pages.store', $funnel) }}" method="POST" id="page-form">
            @csrf
            <input type="hidden" name="title" id="title" value="Nueva Página">
            <input type="hidden" name="content" id="content">

            <div class="mt-6">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                    Guardar Página
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
                fromElement: false,
                height: '500px',
                width: 'auto',
                storageManager: false,
                panels: {
                    defaults: [
                        {
                            id: 'panel-top',
                            el: '.panel__top',
                        },
                        {
                            id: 'panel-basic-actions',
                            el: '.panel__basic-actions',
                            buttons: [
                                {
                                    id: 'visibility',
                                    active: true,
                                    label: '<u>👁</u>',
                                    command: 'sw-visibility',
                                },
                                {
                                    id: 'export',
                                    className: 'btn-open-export',
                                    label: 'Export',
                                    command: 'export-template',
                                    context: 'export-template',
                                },
                            ],
                        },
                    ],
                },
                blockManager: {
                    appendTo: '#gjs',
                    blocks: [
                        {
                            id: 'section',
                            label: '<b>Section</b>',
                            attributes: { class: 'gjs-block-section' },
                            content: `<section>
                                        <h1>Section Title</h1>
                                        <p>This is a simple section.</p>
                                      </section>`,
                        },
                        {
                            id: 'text',
                            label: 'Text',
                            content: '<div data-gjs-type="text">Insert your text here</div>',
                        },
                        {
                            id: 'image',
                            label: 'Image',
                            content: {
                                type: 'image',
                                src: 'https://via.placeholder.com/150',
                            },
                        },
                        {
                            id: 'button',
                            label: 'Button',
                            content: '<button class="button">Click me</button>',
                        },
                    ],
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
