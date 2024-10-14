<h2 class="text-2xl font-bold mt-8 mb-4">Páginas del Funnel</h2>
@if ($funnel->pages->isEmpty())
    <p class="text-gray-600">No hay páginas en este funnel. <a href="{{ route('pages.create', $funnel) }}" class="text-blue-600 hover:underline">Crea una página ahora</a>.</p>
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
