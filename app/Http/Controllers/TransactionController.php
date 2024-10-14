<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntegrationRequest;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction.index');
    }

    public function create(){
        return view('transaction.create');
    }

    public function store(IntegrationRequest $request){

        $data = $request->all();
        

    }
 
}
