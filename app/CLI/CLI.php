<?php

namespace App\CLI;

use WP_CLI;
use App\CLI\Block;

class CLI
{
    public function __construct()
    {
        if (class_exists('WP_CLI')) {
            WP_CLI::add_command('firestarter block', new Block());
        }
    }
}
