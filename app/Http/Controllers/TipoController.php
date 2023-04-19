<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoRequest;
use App\Http\Requests\UpdateTipoRequest;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tipo::class, 'tipo');
    }

    public function index()
    {
        $tipos = Tipo::paginate(25);
        return view('/tipos/index', ['tipos' => $tipos]);
    }

    
    public function create()
    {
        return view('medicamentos/create');
    }

    
    public function store(StoreTipoRequest $request)
    {
        $this->validate($request, [
            'causa' => 'required|string|max:255',
            'ley' => 'required|string|max:255'
        ]);
        $tipo = new Tipo($request->all());
        $tipo->save();
        session()->flash('success', 'Tipo de baja creada correctamente.');
        return redirect()->route('tipos.index');
    }

    
    public function show(Tipo $tipo)
    {
        //
    }

    
    public function edit(Tipo $tipo)
    {
        return view('tipos/edit', ['tipo' => $tipo]);
    }

    
    public function update(UpdateTipoRequest $request, Tipo $tipo)
    {
        $this->validate($request, [
            'causa' => 'required|string|max:255',
            'ley' => 'required|string|max:255'
        ]);
        $tipo = fill($request->all());
        $tipo->save();
        session()->flash('success', 'Tipo de baja creada correctamente.');
        return redirect()->route('tipos.index');
    }

    
    public function destroy(Tipo $tipo)
    {
        if($tipo->delete()) {
            session()->flash('success', 'Tipo de baja borrada');
        }
        else{
            session()->flash('warning', 'No pudo borrarse el tipo de baja.');
        }
        return redirect()->route('tipos.index');
    }
}
