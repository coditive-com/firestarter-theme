<?php

namespace App\Media;

use App\Media\Sizes;
use App\Media\WEBP;

class Media
{
    private Sizes $sizes;

    public function __construct()
    {
        fireclass(Sizes::class);
        fireclass(WEBP::class);
    }
}
