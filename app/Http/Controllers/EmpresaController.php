<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Empresa::class, 'empresa');
    }
   
    public function index()
    {
        $empresas = Empresa::paginate(25);
        return view('/empresas/index', ['empresas' => $empresas]);
    }

    
    public function create()
    {
        return view('empresas/create');
    }

    public function store(StoreEmpresaRequest $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
        ]);
        $empresa = new Empresa($request->all());
        $empresa->save();
        session()->flash('success', 'Empresa creada correctamente');
        return redirect()->route('empresas.index');
    }

    
    public function show(Empresa $empresa)
    {
        return view('empresas/show', ['empresa' => $empresa]);
    }

    
    public function edit(Empresa $empresa)
    {
        //$informes = Informe::all(); baja
        
        return view('empresas/edit', ['empresa' => $empresa]);
    }

    
    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
        ]);
        $empresa->fill($request->all());
        $empresa->save();
        session()->flash('success', 'Empresa modificada correctamente.');
        return redirect()->route('empresas.index');
    }
    
    public function destroy(Empresa $empresa)
    {
        if($empresa->delete()) {
            session()->flash('success', 'Empresa borrado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'La empresa no pudo borrarse. Es probable que se deba a que tenga asociada información como citas que dependen de él.');
        }
        return redirect()->route('empresas.index');
    }
}
