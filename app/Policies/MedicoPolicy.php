<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Medico;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //return $user->tipo_usuario_id == 1; //no se porque es 3, pienso que es 1
        return true;
    }

    
     public function view(User $user, Medico $medico)
    {
        //return $user->tipo_usuario_id == 1;
        return true;
    }

    public function create(User $user)
    {
        return $user->tipo_usuario_id == 3;
    }

    
    public function update(User $user, Medico $medico)
    {
        return $user->tipo_usuario_id == 3 || $medico->id == $user->medico_id;
    }


    public function delete(User $user, Medico $medico)
    {
        return $user->tipo_usuario_id == 3;
    }
    public function __construct()
    {
        //
    }
}
