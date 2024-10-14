@extends('layouts.app')

@section('title', 'Dashboard - ClickFunnels')

@section('content')
    <div class="grid grid-cols-3 gap-6">
        <!-- Resumen de los Funnels -->
        <div class="card p-4">
            <h3 class="text-xl font-semibold mb-4">Resumen de Funnels</h3>
            <p>Total de Funnels: {{ $funnelsCount }}</p>
        </div>

        <!-- Estadísticas de los Leads -->
        <div class="card p-4">
            <h3 class="text-xl font-semibold mb-4">Estadísticas de Leads</h3>
            <p>Nuevos Leads (Últimos 7 días): {{ $leadsCount }}</p>
        </div>

        <!-- Estadísticas de Transacciones -->
        <div class="card p-4">
            <h3 class="text-xl font-semibold mb-4">Transacciones Recientes</h3>
            <p>Total Transacciones: {{ $transactionsTotal }}</p>
            <p>Estado: {{ $transactionsStatus }}</p>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="mt-8">
        <a href="{{ route('funnels.create') }}" class="btn btn-primary">Crear Nuevo Funnel</a>
    </div>
@endsection
