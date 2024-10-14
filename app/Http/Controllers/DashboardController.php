<?php

namespace App\Http\Controllers;

use App\Models\Funnel;
use App\Models\Lead;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $funnelsCount = Funnel::count();
        $leadsCount = Lead::where('created_at', '>=', now()->subDays(7))->count();
        $transactionsTotal = Transaction::sum('amount');
        $transactionsStatus = Transaction::latest()->first()->status ?? 'No hay transacciones';

        return view('dashboard.index', compact('funnelsCount', 'leadsCount', 'transactionsTotal', 'transactionsStatus'));
    }
}

