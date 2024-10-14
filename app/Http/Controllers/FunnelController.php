<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funnel;
use App\Http\Requests\FunnelRequest;

class FunnelController extends Controller
{
    public function index()
    {
        // Filtrar funnels por usuario autenticado
        $funnels = Funnel::where('user_id', auth()->id())->get();
        return view('funnels.index', compact('funnels'));
    }

    public function create()
    {
        return view('funnels.create');
    }

    public function store(FunnelRequest $request)
    {
        // Crear un nuevo funnel asociado al usuario autenticado
        Funnel::create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('funnels.index')->with('success', 'Funnel creado correctamente.');
    }

    public function show(Funnel $funnel)
    {
        // Verificar que el funnel pertenezca al usuario autenticado
        if ($funnel->user_id !== auth()->id()) {
            abort(403);
        }
        return view('funnels.show', compact('funnel'));
    }

    public function edit(Funnel $funnel)
    {
        // Verificar que el funnel pertenezca al usuario autenticado
        if ($funnel->user_id !== auth()->id()) {
            abort(403);
        }
        return view('funnels.edit', compact('funnel'));
    }

    public function update(FunnelRequest $request, Funnel $funnel)
    {
        // Verificar que el funnel pertenezca al usuario autenticado
        if ($funnel->user_id !== auth()->id()) {
            abort(403);
        }
        $funnel->update($request->validated());

        return redirect()->route('funnels.index')->with('success', 'Funnel actualizado correctamente.');
    }

    public function destroy(Funnel $funnel)
    {
        // Verificar que el funnel pertenezca al usuario autenticado
        if ($funnel->user_id !== auth()->id()) {
            abort(403);
        }
        $funnel->delete();
        return redirect()->route('funnels.index')->with('success', 'Funnel eliminado correctamente.');
    }
}
