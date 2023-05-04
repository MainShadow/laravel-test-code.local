<?php

namespace App\Repository;

use Illuminate\Database\Query\Builder;

class CourseRepository extends Repository
{
    /**
     * @return Builder
     */
    public function getBuilderCatalogForPublic(): Builder
    {
        return Builder::class; // mok for query building
    }
}
