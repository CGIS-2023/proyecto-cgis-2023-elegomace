<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    

    protected $fillable = ['causa', 'ley'];

    public function bajas(){
        return $this->belongsToMany(Baja::class)->withPivot('comentarios', 'inicio', 'fin');
    }
}
