<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';

    public function scopeOnly($query){
      return $query->where('paciente.eliminado', 0);
    }
}
