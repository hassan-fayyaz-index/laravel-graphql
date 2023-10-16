<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\AgeGroup;

use App\Models\AgeGroup;

final class Create
{
    /** @param array{} $args */
    public function __invoke($_, array $args)
    {
        return AgeGroup::create([
            'name' => $args['name'],
            'description' => $args['description'],
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
