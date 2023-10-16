<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\AgeGroup;

use App\Models\AgeGroup;

final  class Update
{
    /** @param array{} $args */
    public function __invoke($_, array $args)
    {
        $age_group = AgeGroup::findOrFail($args['id']);

        if (isset($args['name'])) {
            $age_group->name = $args['name'];
        }

        if (isset($args['description'])) {
            $age_group->description = $args['description'];
        }

        $age_group->save();
        return $age_group;
    }
}
