<?php

namespace App\Integrations\CLI;

use WP_CLI;
use App\Integrations\CLI\Block;

class CLI
{
    public function __construct()
    {
        if (class_exists('WP_CLI')) {
            WP_CLI::add_command('firestarter block', new Block());
        }
    }
}
