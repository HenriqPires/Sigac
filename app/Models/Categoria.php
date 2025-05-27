<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
     use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'maximo_horas', 'curso_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function comprovantes()
    {
        return $this->hasMany(Comprovante::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}
