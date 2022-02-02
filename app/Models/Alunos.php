<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Alunos extends Model
{
    use HasApiTokens, HasFactory;//, Authenticatable;
    
    protected $table = "alunos";
    protected $primaryKey = "aluno_id";

    protected $fillable = [
        "nome",
        "cpf",
        "rg",
        "celular",
        "telefone",
        "endereco"
    ];

    protected $hidden = [
        "password"
    ];
}
