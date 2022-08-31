<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogadore extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'posicao', 'numero', 'pais', 'nascimento', 'time_id'
    ];

    protected $casts = [
        'nascimento' => 'datetime'
    ];

    //criando relacionamento com a tabela 'times'
    public function time()
    {
        return $this->belongsTo(Time::class);
    }

}
