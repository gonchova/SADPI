<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Str;

/**
 * Class BaseModel
 * @mixin Builder
 * @mixin QueryBuilder
 * */

class BaseModel extends \Illuminate\Database\Eloquent\Model
{
    //use \Awobaz\Compoships\Compoships;

    public function MuestraSql(QueryBuilder $query): string
    {
        // autor: Martin Krohn, 30/09/2020
        // muestra el SQL completo para debuguear
        $bindings = $query->getBindings();
        array_walk($bindings, function(&$x) {$x = "'$x'";});

        $sql = $query->toSql();
        $sql_with_bindings = Str::replaceArray('?', $bindings, $sql);

        return $sql_with_bindings;
    }

}