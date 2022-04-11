<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Error;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\StringManipulation\Pass\Pass;
use mysqli;

class UsuarioController extends Controller
{
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
        $storeData = $request->validate([
            'nome' => 'required',
            'pass' => 'required',
            'organizacao' => 'required'
        ]);
        $usuarios = new Usuario ([
            'nome' => $request->get('nome'),
            'pass' => $request->get('pass'),
            'organizacao' => $request->get('organizacao')
        ]);
        $usuarios->save();
        return $usuarios;
    }
    //User analysis for login
    public function login(Request $request)
    {
        $verifica = Usuario::where(["nome" => $request->name, "pass"=> $request->pass])->get();

        if (count($verifica) == 0)
            return response()->json([
                'error' => 'Login e/ou senha incorretos'
            ]);
        
        return response()->json([
            'name' => $verifica[0]->nome,
            'pass' => $verifica[0]->pass,
            'organizacao' => $verifica[0]->organizacao
        ]);
    }   

    /**
     * Display the specified resource.
     */
    public function showAll(Request $request)
    {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuarios = Usuario::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'nome' => 'required|max:90',
            'pass' => 'required|max:90',
            'organizacao' => 'required|max:90'
        ]);
        Usuario::whereId($id) ->update($updateData);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $usuarios = Usuario::findOrFail($id);
        $usuarios->delete();
    }
}
