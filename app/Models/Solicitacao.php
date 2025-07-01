<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Solicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'atividade',
        'descricao',
        'quantidade_horas',
        'comprovante',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aluno()
    {
    return $this->belongsTo(Aluno::class, 'user_id',);
    }
}
