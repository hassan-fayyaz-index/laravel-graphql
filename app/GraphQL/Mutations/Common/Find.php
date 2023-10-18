<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\Common;

use Illuminate\Support\Str;

final class Find
{
    /** @param array{} $args */
    public function __invoke($_, array $args)
    {
        $table_name = $args['table_name'];
        $model = 'App\\Models\\' . ucfirst(Str::camel(Str::singular($table_name)));
        return $model::findOrFail($args['id']);
    }
}
