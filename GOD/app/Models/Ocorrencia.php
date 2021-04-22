<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function motivos()
    {
        return $this->belongsToMany(Motivo::Class);
    }
}
