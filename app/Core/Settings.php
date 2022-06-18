<?php

namespace App\Core;

class Settings
{
    /**
     * @action admin_menu
     */
    public function addPage(): void
    {
        add_menu_page(APP_NAME, APP_NAME, 'manage_options', APP_SLUG, function () {
            ?>
                <div class="wrap">
                    <h1><?php echo APP_NAME ?> Settings</h1>
                    <p>Default</p>
                </div>
            <?php
        }, 'dashicons-lightbulb');
    }
}
