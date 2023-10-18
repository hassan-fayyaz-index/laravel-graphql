<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\Common;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

final class Update
{
    /** @param array{} $args */
    public function __invoke($_, array $args)
    {
        $table_name = $args['table_name'];
        $model_class = 'App\\Models\\' . ucfirst(Str::camel(Str::singular($table_name)));
        $model_obj = $model_class::findOrFail($args['id']);
        $model_obj->update($args['data']);
        Log::info(json_encode($model_obj));
        return $model_obj;
    }
}
