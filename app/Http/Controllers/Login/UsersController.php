<?php

namespace App\Http\Controllers\Login;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Login\RegistrarRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;
use App\Http\Requests\Login\LoginRequest;
use App\Models\VistaUsuarios;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        //Registrar usuario

        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $cookie = cookie('token', $token, 60 * 24); // 1 día

        return response()->json([
            'user' => new UserResource($user),
        ])->withCookie($cookie);
    }

    /**
     * Display the specified resource.
     */
    public function iniciar_secion(LoginRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();

            $user = User::where('usuario', $data['usuario'])->first();

            if (!$user || !Hash::check($data['password'], $user->password)) {
                return response()->json([
                    'ok'=>true,
                    'mensajeIncorrecto' => 'Usuario o contraseña incorrectos!'
                ]);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            $cookie = cookie('token', $token, 60 * 24); // 1 day

            DB::commit();

            return response()->json([
                "ok"=>true,
                "data"=>$user
            ])->withCookie($cookie);


        } catch (\Exception $th) {
           return response()->json([
            "ok"=>false,
            "data"=>$th->getMessage(),
            "error"=>'Hubo un error consulte con el Administrador del Sistema'
           ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function cerrar_secion( Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        $cookie = cookie()->forget('token');

        return response()->json([
            'message' => 'Logged out successfully!'
        ])->withCookie($cookie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
