<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente; // Importa o modelo Paciente
use App\Models\User; // Importa o modelo User
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa o trait HasFactory

class Consulta extends Model
{
    use HasFactory; // <-- FALTANDO

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'data_consulta',
        'status',
        'notas_consulta',
    ];


    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(User::class, 'medico_id');
    }
}
