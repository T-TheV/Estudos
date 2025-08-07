<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consulta; // Importa o modelo Consulta


class Paciente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'telefone',
        'endereco',
    ];

    public function consultasPaciente()
    {
        return $this->hasMany(Consulta::class);
    }
}
