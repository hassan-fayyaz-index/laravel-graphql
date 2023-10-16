<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\AgeGroup;

use App\Models\AgeGroup;

final  class Delete
{
    /** @param array{} $args */
    public function __invoke($_, array $args)
    {
        $age_group = AgeGroup::findOrFail($args['id']);
        $age_group->deleted_by = 1;
        $age_group->save();
        $age_group->delete();
        return $age_group;
    }
}
