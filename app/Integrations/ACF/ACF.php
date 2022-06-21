<?php

namespace App\Integrations\ACF;

use App\Integrations\ACF\Blocks;
use App\Integrations\ACF\JSON;
use App\Integrations\ACF\Settings;

class ACF
{
    public function __construct()
    {
        fireclass(Blocks::class);
        fireclass(JSON::class);
    }

    /**
     * @filter firestarter_class_name
     */
    public function setSettingsClass(string $class): string
    {
        if ($class === 'App\Integrations\WP\Settings') {
            return Settings::class;
        }

        return $class;
    }
}
