<?php

namespace App\Core;

use App\Core\Hooks;
use App\Core\Singleton;
use App\Posts\Posts;

class Facade extends Singleton
{
    private Hooks $hooks;

    private Posts $posts;

    protected function __construct()
    {
        $this->hooks = new Hooks();

        $this->hooks->wrapHooks($this->posts = new Posts());
    }

    public function hooks(): Hooks
    {
        return $this->hooks;
    }

    public function posts(): Posts
    {
        return $this->posts;
    }
}
