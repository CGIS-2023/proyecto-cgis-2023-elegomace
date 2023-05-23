<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Medico;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }

    
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo_usuario_id' => 'required|numeric'
        ];

        $tipo_usuario_id = intval($request->tipo_usuario_id);
        if($tipo_usuario_id == 1){
            //Médico
            $reglas_medico = ['telefono' => 'required|numeric',
                'num_licenciado' => 'required|numeric'
            ];
            $rules = array_merge($reglas_medico, $rules);
        }
        elseif($tipo_usuario_id == 2){
            //Paciente
            //$reglas_paciente = ['nuhsa' => ['required', 'string', 'max:12', 'min:12', new Nuhsa()]];
            $reglas_paciente = ['dni' => 'required'|'string'];
            $rules = array_merge($reglas_paciente, $rules);
        }
        $request->validate($rules);

/*
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|confirmed|min:8',
        ]); */

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($tipo_usuario_id == 1) {
            //Médico
            $medico = new Medico($request->all());
            $medico->user_id = $user->id;
            $medico->save();
        }
        elseif($tipo_usuario_id == 2){
            //Paciente
            $paciente = new Paciente($request->all());
            $paciente->user_id = $user->id;
            $paciente->save();
        }
        $user->fresh();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
