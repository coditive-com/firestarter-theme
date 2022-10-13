<?php

namespace App\Media;

use App\Media\Sizes;

class Media
{
    private Sizes $sizes;

    public function __construct()
    {
        fireclass(Sizes::class);
    }
}
