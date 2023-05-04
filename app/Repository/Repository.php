<?php

namespace App\Repository;

/**
 * Parent class of repositories
 */
class Repository
{
    /**
     * @return static
     */
    public static function factory(): static
    {
        return new static();
    }
}
