<?php

namespace App\Core;

class Setup
{
    /**
     * @filter upload_mimes
     */
    public function setUploadTypes(array $mimes): array
    {
        if (! isset($mimes['svg'])) {
            $mimes['svg'] = 'image/svg+xml';
        }

        return $mimes;
    }
}
