<?php

namespace App\Integrations;

use App\Integrations\ACF\ACF;
use App\Integrations\CLI\CLI;
use App\Integrations\WP\WP;

class Integrations
{
    public function __construct()
    {
        fireclass(CLI::class);
        fireclass(WP::class);

        if (in_array('advanced-custom-fields-pro/acf.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            fireclass(ACF::class);
        }
    }
}
