<?php

namespace App\Integrations\WP;

use App\Core\Settings as SettingsBase;

class Settings extends SettingsBase
{
    public function get(string $key)
    {
        return get_option('options_' . $key);
    }

    public function addPage(): void
    {
        add_menu_page(APP_NAME, APP_NAME, 'manage_options', APP_SLUG, function () {
            echo 'settings';
        }, 'dashicons-lightbulb');
    }
}
