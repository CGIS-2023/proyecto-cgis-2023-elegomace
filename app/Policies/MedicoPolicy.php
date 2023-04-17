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
        return true;
    }

    
     public function view(User $user, Medico $medico)
    {
        return $user;
    }

    public function create(User $user)
    {
        return true;
    }

    
    public function update(User $user, Medico $medico)
    {
        return true;
    }


    public function delete(User $user, Medico $medico)
    {
        return true;
    }
    public function __construct()
    {
        //
    }
}
