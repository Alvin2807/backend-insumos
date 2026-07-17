<?php

namespace App\Http\Controllers\TipoImpresoras;

use App\Models\TipoImpresora;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoImpresoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar los tipos de impresoras
        $tipoImpresora = TipoImpresora::all();
        return response()->json([
            "ok"=>true,
            "data"=>$tipoImpresora
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoImpresora $tipoImpresora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoImpresora $tipoImpresora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoImpresora $tipoImpresora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoImpresora $tipoImpresora)
    {
        //
    }
}
