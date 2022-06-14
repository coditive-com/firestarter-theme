<?php

namespace App;

use App\Core\Init;

if (! function_exists('App\\firestarter')) {
    function firestarter(string $module = '')
    {
        $modules = Init::get();

        if ('' === $module) {
            return $modules;
        }

        if (! array_key_exists($module, $modules->public)) {
            throw new \Exception(sprintf('Module %1$s doesn\'t exists!', $module));
        }

        return $modules->public[$module];
    }
}
