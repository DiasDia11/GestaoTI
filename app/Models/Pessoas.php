<?php

namespace App\Models;

use App\Repositories\EquipamentoRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'setor',
    ];

    public function equipamentos()
    {
    return $this->belongsToMany(Equipamentos::class, 'PessoaEquipamento', 'pessoa_id', 'equipamento_id');
    }
}
