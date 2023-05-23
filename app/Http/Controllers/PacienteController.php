<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Models\Paciente;
use App\Models\User;

class PacienteController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Paciente::class, 'paciente');
    }
    public function index()
    {
        $pacientes = Paciente::paginate(25);
        return view('/pacientes/index', ['pacientes' => $pacientes]);
    }

    
    public function create()
    {
        return view('pacientes/create');
    }

    public function store(StorePacienteRequest $request)
    {
        $this->validate($request, [
            'dni' => 'required|string|max:255',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $paciente = new Paciente($request->all());
        $paciente->user_id = $user->id;
        $paciente->save();
        session()->flash('success', 'Paciente creado correctamente');
        return redirect()->route('pacientes.index');
    }

    
    public function show(Paciente $paciente)
    {
        //
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes/edit', ['paciente' => $paciente]);
    }

    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $this->validate($request, [
            'dni' => 'required|string|max:255',
        ]);
        $user = $paciente->user;
        $user->fill($request->all());
        $user->save();
        $paciente->fill($request->all());
        $paciente->save();
        session()->flash('success', 'Paciente modificado correctamente');
        return redirect()->route('pacientes.index');
    }

    public function destroy(Paciente $paciente)
    {
        if($paciente->delete()) {
            session()->flash('success', 'Paciente borrado correctamente.');
        }
        else{
            session()->flash('warning', 'El paciente no pudo borrarse.');
        }
        return redirect()->route('pacientes.index');
    }
}
