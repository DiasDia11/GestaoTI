<?php

namespace App\Repositories;

use App\Models\Equipamentos;

class EquipamentoRepository extends AbstractRepository
{
    protected static $model = Equipamentos::class;

    public static function findByEmpresa(string $empresa){
        return self::loadModel()::query()->where(['empresa' => $empresa])->first();
    }

    public static function findByNome(string $nome){
        return self::loadModel()::query()->where(['nome' => $nome])->first();
    }

}
