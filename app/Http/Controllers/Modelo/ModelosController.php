<?php

namespace App\Http\Controllers\Modelo;

use App\Models\Modelo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Modelo\RegistrarRequest;
use App\Models\VistaModelos;
use Illuminate\Support\Facades\DB;

class ModelosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar los modelos
       $modelos = VistaModelos::all();
       return response()->json([
        "ok" =>true,
        "data"=>$modelos
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
    public function store(RegistrarRequest $request)
    {
        //Registrar modelo
        try {
           DB::beginTransaction();
           $nombre_modelo = strtoupper($request->input('modelo'));
           $consulta = Modelo::select('id_modelo', 'modelo')
              ->where('modelo', $nombre_modelo)
              ->get();
              if (count($consulta) > 0) {
               return response()->json([
                  'ok' => true,
                  'message' => 'Ya existe un modelo con el mismo nombre',
               ]);
              } else {
                $modelo = new Modelo();
                $modelo->fk_marca = $request->input('fk_marca');
                $modelo->modelo = $nombre_modelo;
                $modelo->save();
                DB::commit();
                return response()->json([
                  'ok' => true,
                  'message' => 'Registro existoso',
                  'data' => $modelo
                ]);
              }
             
              
        } catch (\Exception $th) {
           DB::rollBack();
           return response()->json([
                'ok' => false,
                'data' => $th->getMessage(),
                'message' => 'Error al registrar el modelo',
           ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelo $modelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelo $modelo)
    {
        //
    }
}
