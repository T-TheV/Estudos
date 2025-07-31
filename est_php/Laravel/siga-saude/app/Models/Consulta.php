<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = ['paciente_id', 'data_consulta', 'status'];
    public function paciente()
{
    return $this->belongsTo(Paciente::class);
}
}
