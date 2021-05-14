<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    public function alunos()
    {
        return $this->hasMany(Aluno::Class);
    }

    public function escola()
    {
        return $this->belongsTo(Escola::Class);
    }
}
