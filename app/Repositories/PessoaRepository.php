<?php

namespace App\Repositories;

use App\Models\Pessoas;

class PessoaRepository extends AbstractRepository
{
    protected static $model = Pessoas::class;

    public static function findBySetor(string $setor){
        return self::loadModel()::query()->where(['setor' => $setor])->first();
    }
}
