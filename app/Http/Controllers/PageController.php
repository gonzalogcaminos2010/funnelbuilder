<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Funnel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Funnel $funnel)
{
    return view('pages.index', compact('funnel'));
}

    public function create(Funnel $funnel)
    {
        return view('pages.create', compact('funnel'));
    }

    public function store(Request $request, Funnel $funnel)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);
    
        // Crear la página asociada al funnel
        $page = new Page([
            'funnel_id' => $funnel->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
    
        $page->save();
    
        return redirect()->route('funnels.show', $funnel)->with('success', 'Página creada correctamente.');
    }
    

    public function edit(Funnel $funnel, Page $page)
    {
        return view('pages.edit', compact('funnel', 'page'));
    }

    public function update(Request $request, Funnel $funnel, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $page->update($request->all());

        return redirect()->route('funnels.show', $funnel)->with('success', 'Página actualizada correctamente.');
    }

    public function show(Funnel $funnel, Page $page){
        return view('pages.show', compact('funnel', 'page'));
    }

    public function destroy(Funnel $funnel, Page $page)
    {
        $page->delete();

        return redirect()->route('funnels.show', $funnel)->with('success', 'Página eliminada correctamente.');
    }
}
