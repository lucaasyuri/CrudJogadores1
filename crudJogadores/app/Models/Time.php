<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'ano_fundacao', 'pais'
    ];

    public function jogadores()
    {
        return $this->hasMany(Jogadore::class);
    }

}
