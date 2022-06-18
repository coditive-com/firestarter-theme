<?php

namespace App\Integrations\ACF;

class Settings
{
    /**
     * @action admin_menu 9
     */
    public function addPage(): void
    {
        remove_action('admin_menu', [firestarter()->settings(), 'addPage']);

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
