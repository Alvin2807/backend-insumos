<?php

namespace App\Http\Controllers\Nomenclaturas;

use App\Models\Nomenclatura;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Nomenclatura\RegistrarRequest;
use Illuminate\Support\Facades\DB;
use App\Models\VistaNomenclatura;
class NomenclaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostra nomenclaturas
        $nomenclatura = VistaNomenclatura::
        select('id_nomenclatura','fk_despacho','fk_modelo','modelo','marca','tipo_impresora','direccion_ip','nomenclatura')
        ->orderby('nomenclatura','asc')
        ->get();
        return response()->json([
            "ok"=>true,
            "data"=>$nomenclatura
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
        try {
            DB::beginTransaction();
            
            $nombre_nomenclatura = strtoupper($request->input('nomenclatura'));
            $consulta = Nomenclatura::
            select('id_nomenclatura','nomenclatura')
            ->where('nomenclatura', $nombre_nomenclatura)
            ->get();
            if (count($consulta) > 0) {
               return response()->json([
                "ok"=>true,
                "exite"=>'Ya existe una nomenclatura con el mismo nombre',
                
               ]);
            } else {
                $nomenclatura = new Nomenclatura();
                $nomenclatura->fk_despacho = $request->input('fk_despacho');
                $nomenclatura->fk_tipo_impresora = $request->input('fk_tipo_impresora');
                $nomenclatura->direccion_ip = $request->input('direccion_ip');
                $nomenclatura->nomenclatura = strtoupper($request->input('nomenclatura'));
                $nomenclatura->fk_modelo = $request->input('fk_modelo');
                $nomenclatura->usuario_crea = strtoupper($request->input('usuario_crea'));
                $nomenclatura->save();
                DB::commit();
                return response()->json([
                    "ok"=>true,
                    "data"=>$nomenclatura,
                    "exitoso"=>'Registro existoso'
                ]);

            }
        } catch (\Exepction $th) {
            DB::rollback();
            return response()->json([
                "ok"=>false,
                "data"=>$th->getMessage(),
                "errorRegistro"=>'Error al registrar la nomenclatura',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nomenclatura $nomenclatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nomenclatura $nomenclatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nomenclatura $nomenclatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nomenclatura $nomenclatura)
    {
        //
    }
}
