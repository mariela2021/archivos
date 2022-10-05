<?php

namespace App\Http\Controllers;

use App\Models\ActivoFijo;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;

class ActivoFijoController extends Controller
{
    public function index()
    {
        return view('activo.index');
    }

    public function create()
    {
        $areas = Area::all();
        $users = User::all();
        return view('activo.create', compact('areas', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:activo_fijos',
            'estado' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'required|string',
            'unidad' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'tipo' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'id_area' => 'required|numeric',
            'id_usuario' => 'required|numeric',
        ]);
        $activo = ActivoFijo::create($request->all());
        return redirect()->route('activo.index', $activo);
    }

    public function edit(ActivoFijo $activo)
    {
        $activo = ActivoFijo::find($activo->id);
        $areas = Area::all();
        $users = User::all();
        return view('activo.edit', compact('activo', 'areas', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|unique:activo_fijos,codigo,' . $id,
            'estado' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'required|string',
            'unidad' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'tipo' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'id_area' => 'required|numeric',
            'id_usuario' => 'required|numeric',
        ]);
        $activo = ActivoFijo::findOrFail($id);
        $activo->update($request->all());
        return redirect()->route('activo.index');
    }

    public function destroy($activo)
    {
        $activo = ActivoFijo::findOrFail($activo);
        $activo->delete();
        return back()->with('mensaje', 'Eliminado Correctamente');
    }
}
