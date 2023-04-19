<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = ['num_licenciado', 'name', 'surname', 'telefono'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    /**public function informes(){
        return $this->hasMany(Informe::class);
    } */

    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }
}
