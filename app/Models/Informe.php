<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_inicio','fecha_fin', 'medico_id', 'paciente_id', 'empresa_id', 'motivo', 'frecuencia'];

    protected $casts = [
        'fecha_inicio' => 'datetime:Y-m-d',
        'fecha_fin' => 'datetime:Y-m-d',
    ];

    public function medico(){
        return $this->belongsTo(Medico::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    //falta motivo y frecuencia q no se si hay que ponerlo aqui
}
