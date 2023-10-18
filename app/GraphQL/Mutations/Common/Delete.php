<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\Common;

use Illuminate\Support\Str;

final class Delete
{
    /** @param array{} $args */
    public function __invoke($_, array $args)
    {
        $table_name = $args['table_name'];
        $model_class = 'App\\Models\\' . ucfirst(Str::camel(Str::singular($table_name)));
        $model_obj = $model_class::findOrFail($args['id']);
        $model_obj->delete();
        return $model_obj;
    }
}
