<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        // Crea un nuevo lead y lo almacena en la base de datos
        $lead = new Lead();
        $lead->name = $request->input('name');
        $lead->email = $request->input('email');
        $lead->save();

        return redirect()->route('leads.index')->with('success', 'Lead creado correctamente.');
    }

    public function show(Lead $lead)
    {
        // Muestra el detalle de un lead específico
        return view('leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        // Editar un lead específico
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, Lead $lead)
    {
        // Actualiza el lead en la base de datos
        $lead->name = $request->input('name');
        $lead->email = $request->input('email');
        $lead->save();

        return redirect()->route('leads.index')->with('success', 'Lead actualizado correctamente.');
    }

    public function destroy(Lead $lead)
    {
        // Elimina un lead de la base de datos
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead eliminado correctamente.');
    }
}
