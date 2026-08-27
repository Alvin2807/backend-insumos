<?php

namespace App\Http\Controllers\Marcas;

use App\Models\Marca;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Marcas\RegistrarRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Marcas\EditarRequest;
use Carbon\Carbon;
use App\Utils\Utilidades;
class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar todas las marcas
        $marca = Marca::select('id_marca','marca','cant_mov')
        ->orderBy('marca','asc')
        ->get();
        return response()->json([
            "ok" => true,
            "data" => $marca
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
           $nombre_marca = strtoupper($request->input('marca'));
           $usuario = strtoupper($request->input('usuario'));
           $consulta = Marca::select('id_marca', 'marca')
           ->where('marca', $nombre_marca)
           ->get();
           if (count($consulta) > 0) {
            return response()->json([
                "ok"=>true,
                "existe"=>'Existe una marca con el mismo nombre'
            ]);
           } else {
            $marca = new Marca();
            $marca->marca = $nombre_marca;
            $marca->usuario_crea = $usuario;
            $marca->save();
            DB::commit();
            return response()->json([
                "ok"=>true,
                "exitoso"=>'Registro existoso',
                "data"=>$marca
            ]);
           }
        } catch (\Exception $th) {
           DB::rollback();
           return response()->json([
                "ok"=>false,
                "data"=>$th->getMessage(),
                "errorRegistro"=>'Error al registrar la marca'
           ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editar(EditarRequest $request)
    {
        try {
           DB::beginTransaction();
           $nombre_marca = strtoupper($request->input('marca'));
           $usuario = strtoupper($request->input('usuario'));
           $id_marca = $request->input('id_marca');
          /*  $fecha = Carbon::now(); */
           $consulta = Marca::select('id_marca','marca')
           ->where('marca', $nombre_marca)
           ->where('id_marca', '<>', $id_marca)
           ->count();
           if ($consulta) {
            return response()->json([
                "ok"=>true,
                "existeMarca"=>'Existe una marca con el mismo nombre'
            ]);
           } else {
            $marca = new Marca();
            $data['marca'] = $nombre_marca;
            $data['usuario_modifica'] = $usuario;
            $marca = Marca::where('id_marca', $id_marca)->update($data);
            DB::commit();
            return response()->json([
                "ok"=>true,
                "data"=>$marca,
                "guardado"=>'Se guardo exitosamente'
            ]);
           }

        } catch (\Exception $th) {
            DB::rollback();
            return response()->json([
                "ok"=>false,
                "data"=>$th->getMessage(),
                "errorModificado"=>'Error al guardar cambios'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        //
    }
}
