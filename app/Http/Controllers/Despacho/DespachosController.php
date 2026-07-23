<?php

namespace App\Http\Controllers\Despacho;

use App\Models\VistaDespacho;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DespachosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Despachos de Colón
        $vistaDespacho = VistaDespacho::
        select('id_despacho','fk_provincia','despacho','provincia')
        ->orderby('despacho','asc')
        ->where('provincia','COLÓN')
        ->get();
        return response()->json([
            "ok"=>true,
            "data"=>$vistaDespacho
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function despachosPanama()
    {
        //Despachos de Panamá
        $vistaDespacho = VistaDespacho::
        select('id_despacho','fk_provincia','despacho','provincia')
        ->orderby('despacho','asc')
        ->where('provincia','PANAMÁ')
        ->get();
        return response()->json([
            "ok"=>true,
            "data"=>$vistaDespacho
        ]);
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
    public function show(VistaDespacho $vistaDespacho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VistaDespacho $vistaDespacho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VistaDespacho $vistaDespacho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VistaDespacho $vistaDespacho)
    {
        //
    }
}
