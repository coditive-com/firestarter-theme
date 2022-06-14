<?php

namespace App\Posts;

use App\Posts\Repository;

class Posts
{
    private Repository $repository;

    public function __construct()
    {
        $this->repository = fireclass(Repository::class);
    }

    public function repository(): Repository
    {
        return $this->repository;
    }
}
