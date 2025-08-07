<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::paginate(15);
        return UserResource::collection($usuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuario = User::create($request->validated());
        
        return response()->json([
            'success' => true,
            'message' => 'Usuário criado com sucesso',
            'data' => new UserResource($usuario)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return response()->json([
            'success' => true,
            'data' => new UserResource($usuario)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, User $usuario)
    {
        $usuario->update($request->validated());
        
        return response()->json([
            'success' => true,
            'message' => 'Usuário atualizado com sucesso',
            'data' => new UserResource($usuario)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Usuário excluído com sucesso'
        ]);
    }
}
