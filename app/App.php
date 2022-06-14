<?php

namespace App;

use App\Core\Singleton;
use App\Posts\Posts;

class App extends Singleton
{
    private Posts $posts;

    protected function __construct()
    {
        $this->posts = fireclass(Posts::class);
    }

    public function posts(): Posts
    {
        return $this->posts;
    }
}
