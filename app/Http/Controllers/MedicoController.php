<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Medico::class, 'medico');
    }

    public function index()
    {
        $medicos = Medico::paginate(25);
        return view('/medicos/index', ['medicos' => $medicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos/create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'telefono' => 'required|numeric',
            'num_licenciado' => 'required|numeric',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $medico = new Medico($request->all());
        $medico->user_id = $user->id;
        $medico->save();
        session()->flash('success', 'Médico creado correctamente.'); //Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('medicos.index');
    }

    public function show(Medico $medico)
    {
        return view('medicos/show');
    }

    
    public function edit(Medico $medico)
    {
        return view('medicos/edit', ['medico' => $medico]);
    }

    public function update(Request $request, Medico $medico)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'telefono' => 'required|numeric',
            'num_licenciado' => 'required|numeric',
        ]);
        $user = $medico->user;
        $user->fill($request->all());
        $user->save();
        $medico->fill($request->all());
        $medico->save();
        session()->flash('success', 'Médico modificado correctamente.');
        return redirect()->route('medicos.index');
    }

    
    public function destroy(Medico $medico)
    {
        if($medico->delete()) {
            session()->flash('success', 'Médico borrado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'El médico no pudo borrarse. Es probable que se deba a que tenga asociada información como citas que dependen de él.');
        }
        return redirect()->route('medicos.index');
    }
}