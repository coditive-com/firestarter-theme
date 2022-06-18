<?php

namespace App\Integrations\ACF;

use App\Integrations\ACF\Blocks;
use App\Integrations\ACF\Settings;

class ACF
{
    public function __construct()
    {
        fireclass(Blocks::class);
        fireclass(Settings::class);
    }
}
