<?php

namespace App\Integrations\ACF;

/**
 * @see https://www.advancedcustomfields.com/resources/local-json/
 */
class JSON
{
    /**
     * @filter acf/settings/save_json
     */
    public function setLocalSavePath(string $path): string
    {
        if ($this->isLocalActive()) {
            return $this->getLocalPath();
        }

        return $path;
    }

    /**
     * @filter acf/settings/load_json
     */
    public function setLocalLoadPath(array $paths): array
    {
        if ($this->isLocalActive()) {
            unset($paths[0]);
            $paths[] = $this->getLocalPath();
        }

        return $paths;
    }

    public function getLocalPath(): string
    {
        return APP_RESOURCES_PATH . '/fields';
    }

    public function isLocalActive(): bool
    {
        if (defined('FIRESTARTER_INTEGRATIONS_ACF_LOCAL_JSON') && false === FIRESTARTER_INTEGRATIONS_ACF_LOCAL_JSON) {
            return false;
        }

        if (! file_exists($this->getLocalpath())) {
            return false;
        }

        return true;
    }
}
