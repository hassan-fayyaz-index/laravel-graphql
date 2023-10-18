<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\Common;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

final  class Create
{
    /** @param array{} $args */
    public function __invoke($_, array $args)
    {
        $tableName = $args['table_name'];
        $model = 'App\\Models\\' . ucfirst(Str::camel(Str::singular($tableName)));
        $data = $model::create($args['data']);
        Log::info(json_encode($data));
        return $data;
    }
}
