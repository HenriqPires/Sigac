<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'cpf', 'email', 'password', 'user_id', 'curso_id', 'turma_id'];

    protected $hidden = ['password']; 

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function solicitacoes()
    {
        return $this->hasMany(Solicitacao::class, 'user_id', 'user_id');
    }
}
