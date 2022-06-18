<?php

namespace App\Integrations;

use App\Integrations\ACF\ACF;

class Integrations
{
    public function __construct()
    {
        if (in_array('advanced-custom-fields-pro/acf.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            fireclass(ACF::class);
        }
    }
}
