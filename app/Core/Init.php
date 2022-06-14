<?php

namespace App\Core;

use App\Core\ACF;
use App\Core\Hooks;
use App\Core\Singleton;

class Init extends Singleton
{
    private Hooks $hooks;

    private ACF $acf;

    protected function __construct()
    {
        $this->hooks = new Hooks();

        $this->hooks->wrapHooks($this->acf = new ACF());
    }

    public function hooks(): Hooks
    {
        return $this->hooks;
    }
}
