<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatepasswordRequest;
use App\Models\AdmisionePostulante;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsersettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        return Redirect::route('dashboard.settings.edit',auth()->id());
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);
        return view('dashboard.settings.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            //code...
            $id = auth()->id();
            $user = User::findOrFail($id);
            $cliente = Cliente::findOrFail($user->ucliente->cliente->idCliente);
            $cliente->telefono = $request->telefono1;
            $cliente->telefono2 = $request->telefono2;
            $cliente->direccion = $request->direccion;
            $cliente->save();
            AdmisionePostulante::where('idCliente','=',$cliente->idCliente)->update(['fechaNacimiento'=>$request->nacimiento]);

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
        return Redirect::route('dashboard.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function edit_password(){
        $user = User::findOrFail(auth()->id());
        return view('dashboard.settings.edit_password',compact('user'));
    }
    public function update_password(UpdatepasswordRequest $request){
        $user = User::findOrFail(auth()->id());
        $user->password = bcrypt($request->password1);
        $user->update();
        return Redirect::route('dashboard.index');
    }
}