<?php

namespace App\Integrations\ACF;

use App\Core\Settings as SettingsBase;

class Settings extends SettingsBase
{
    public function get(string $key)
    {
        return get_field($key, 'options');
    }

    public function addPage(): void
    {
        acf_add_options_page([
            'page_title' => APP_NAME,
            'menu_title' => APP_NAME,
            'menu_slug' => APP_SLUG,
            'capability' => 'manage_options',
            'redirect' => false,
            'icon_url' => 'dashicons-lightbulb',
        ]);
    }
}
