<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'modelo',
        'empresa',
        'marca'
    ];

    public function pessoas()
    {
    return $this->belongsToMany(Pessoas::class, 'PessoaEquipamento', 'equipamento_id', 'pessoa_id');
    }
}
