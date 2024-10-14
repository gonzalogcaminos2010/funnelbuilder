<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;
use App\Http\Requests\ElementRequest;

class ElementController extends Controller
{
    public function index()
    {
        $elements = Element::all();
        return view('elements.index', compact('elements'));
    }

    public function create()
    {
        return view('elements.create');
    }

    public function store(ElementRequest $request)
    {
        // Crea un nuevo element y lo almacena en la base de datos
        $element = new Element();
        $element->type = $request->input('type');
        $element->content = $request->input('content');
        $element->order = $request->input('order');
        $element->save();

        return redirect()->route('elements.index')->with('success', 'Element creado correctamente.');
    }

    public function show(Element $element)
    {
        // Muestra el detalle de un element específico
        return view('elements.show', compact('element'));
    }

    public function edit(Element $element)
    {
        return view('elements.edit', compact('element'));
    }

    public function update(Request $request, Element $element)
    {
        // Actualiza el element en la base de datos
        $element->type = $request->input('type');
        $element->content = $request->input('content');
        $element->order = $request->input('order');
        $element->save();

        return redirect()->route('elements.index')->with('success', 'Element actualizado correctamente.');
    }

    public function destroy(Element $element)
    {
        // Elimina el element de la base de datos
        $element->delete();
        return redirect()->route('elements.index')->with('success', 'Element eliminado correctamente.');
    }
}
