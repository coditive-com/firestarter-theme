<?php

namespace App\Integrations\ACF;

use App\Integrations\ACF\Blocks;

class ACF
{
    public function __construct()
    {
        fireclass(Blocks::class);
    }
}
