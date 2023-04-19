<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBajaRequest;
use App\Http\Requests\UpdateBajaRequest;
use App\Models\Baja;
use App\Models\Medico;
use App\Models\Paciente;

class BajaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Baja::class, 'baja');
    }


    public function index()
    {
        $bajas = Baja::orderBy('fecha_hora', 'desc')->paginate(25);
        return view('/bajas/index', ['bajas' => $bajas]);
    }

    
    public function create()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('bajas/create', ['medicos' => $medicos, 'pacientes' => $pacientes]);
    }

    
    public function store(StoreBajaRequest $request)
    {
        $reglas = [
            'fecha_hora' => 'required|date|after:yesterday',
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
        
        ];
        $this->validate($request, $reglas);
        $baja = new Baja($request->all());
        $baja->save();
        session()->flash('success', 'Baja creada correctamente. ');
        return redirect()->route('bajas.index');
    }

    
    public function show(Baja $baja)
    {
        return view('bajas/show', ['baja' => $baja]);
    }

    
    public function edit(Baja $baja)
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('bajas/edit', ['baja' => $baja, 'pacientes' => $pacientes, 'medicos' => $medicos]);
    }

    public function update(UpdateBajaRequest $request, Baja $baja)
    {
        $reglas = [
            'fecha_hora' => 'required|date|after:yesterday',
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:paciente,id',
        ];
        $this->validate($request, $reglas);
        $baja->fill($request->all());
        $baja->save();
        session()->flash('success', 'Baja modificada correctamente.');
        return redirect()->route('bajas.index');
    }

    public function destroy(Baja $baja)
    {
        if($baja->delete()) {
            session()->flash('success', 'Baja borrado correctamente. ');
        }
        else{
            session()->flash('warning', 'La baja no pudo borrarse. ');
        }
        return redirect()->route('bajas.index');
    }

    public function attach_tipo(Request $request, Baja $baja)
    {
        $this->validateWithBag('attach',$request, [
            //'tipo_id' => 'required|exists:medicos,id',
            'inicio' => 'required|date',
            'fin' => 'required|date|after:inicio',
            'comentarios' => 'nullable|string',
        ]);
        $baja->tipos()->attach($request->tipo_id, [
            'inicio' => $request->inicio,
            'fin' => $request->fin,
            'comentarios' => $request->comentarios,
        ]);
        return redirect()->route('bajas.edit', $baja->id);
    }

    public function detach_tipo(Baja $baja, Tipo $tipo)
    {
        $baja->tipos()->detach($tipo->id);
        return redirect()->route('bajas.edit', $baja->id);
    }
}
