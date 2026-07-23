<?php

namespace App\Http\Controllers\Articulos;

use App\Models\Articulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Articulos\RegistrarRequest;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            DB::beginTransaction();
            $codigo   = strtoupper($request->input('codigo'));
            $consulta = Articulo::
            select('id_articulo','codigo')
            ->where('codigo', $codigo)
            ->get();
            if (count($consulta ) > 0) {
                return response()->json([
                    "ok"=>true,
                    "existe"=>'Ya existe un código de insumo con el mismo nombre.'
                ]);
            } else {
                $articulo = new Articulo();
                $articulo->codigo = strtoupper($request->input('codigo'));
                $articulo->modelo_tinta = strtoupper($request->input('modelo_tinta'));
                $articulo->fk_categoria = $request->input('fk_categoria');
                $articulo->fk_marca = $request->input('fk_marca');
                $articulo->fk_modelo = $request->input('fk_modelo');
                $articulo->fk_color  = $request->input('fk_color');
                $articulo->detalle_insumo = $request->input('detalle_insumo');
                $articulo->usuario_crea = strtoupper($request->input('usuario'));
                $articulo->save();
                DB::commit();
                return response()->json([
                    "ok"=>true,
                    "data"=>$articulo,
                    "exitoso"=>'Registro exitoso'
                ]);
            }
          
        } catch (\Exception $th) {
           DB::rollback();
           return response()->json([
            "ok"=>true,
            "data"=>$th->getMessage(),
            "error"=>'Error a registrar el insumo.'
           ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulo $articulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        //
    }
}
