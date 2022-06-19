<?php

namespace App\Core;

abstract class Settings
{
    public const DEFAULT = 'App\Integrations\WP\Settings';

    abstract public function get(string $key);

    abstract public function addPage(): void;

    /**
     * @action admin_menu
     */
    public function renderPage(): void
    {
        $this->addPage();
    }
}
