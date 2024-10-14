<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Integration;
use App\Http\Requests\IntegrationRequest;

class IntegrationController extends Controller
{
    public function index()
    {
        $integrations = Integration::all();
        return view('integrations.index', compact('integrations'));
    }

    public function create()
    {
        return view('integrations.create');
    }

    public function store(IntegrationRequest $request)
    {
        // Crea un nuevo integration y lo almacena en la base de datos
        $integration = new Integration();
        $integration->type = $request->input('type');
        $integration->credentials = json_encode($request->input('credentials'));
        $integration->save();

        return redirect()->route('integrations.index')->with('success', 'Integration creado correctamente.');
    }

    public function show(Integration $integration)
    {
        // Muestra el detalle de un integration específico
        return view('integrations.show', compact('integration'));
    }

    public function edit(Integration $integration)
    {
        return view('integrations.edit', compact('integration'));
    }

    public function update(Request $request, Integration $integration)
    {
        // Actualiza el integration en la base de datos
        $integration->type = $request->input('type');
        $integration->credentials = json_encode($request->input('credentials'));
        $integration->save();

        return redirect()->route('integrations.index')->with('success', 'Integration actualizado correctamente.');
    }

    public function destroy(Integration $integration)
    {
        // Elimina el integration de la base de datos
        $integration->delete();
        return redirect()->route('integrations.index')->with('success', 'Integration eliminado correctamente.');
    }
}
