<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\Common;

use Illuminate\Support\Str;

final class Paginate
{
    /** @param array{} $args */
    public function __invoke($_, array $args)
    {
        $table_name = $args['table_name'];
        $model = 'App\\Models\\' . ucfirst(Str::camel(Str::singular($table_name)));

        $query = $model::query();
        if (isset($args['name'])) {
            $query->where('name', 'like', '%' . $args['name'] . '%');
        }

        if (isset($args['orderBy'])) {
            foreach ($args['orderBy'] as $order) {
                $query->orderBy($order['column'], $order['order']);
            }
        }

        return $query->paginate($args['count'] ?? 10);
    }
}
