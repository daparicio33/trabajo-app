<?php

namespace App\Http\Controllers;

use App\Models\Sectore;
use Illuminate\Http\Request;

class SectoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:dashboard.administrador.sectores.index')->only('index');
        $this->middleware('can:dashboard.administrador.sectores.create')->only('create','store');
        $this->middleware('can:dashboard.administrador.sectores.edit')->only('edit','update');
        $this->middleware('can:dashboard.administrador.sectores.destroy')->only('destroy');
        $this->middleware('can:dashboard.administrador.sectores.show')->only('show');
    }
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
    public function store(Request $request)
    {
        //
        try {
            //code...
            $sectore = new Sectore();
            $sectore->nombre = $request->nombre;
            $sectore->save();
            //ahora devolvemos los datos del rubro
        } catch (\Throwable $th) {
            //throw $th;
            $array = ["respuesta"=>'error no se guardo'];
            return json_encode($array);
        }
        $array = ["respuesta"=>'rubro guardado'];
        return json_encode($sectore);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
