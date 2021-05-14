<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    public function ocorrencias()
    {
        return $this->hasMany(Ocorrencia::Class);
    }

    public function turma()
    {
        return $this->belongsToMany(Turma::Class);
    }
}
