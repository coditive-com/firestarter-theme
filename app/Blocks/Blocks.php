<?php

namespace App\Blocks;

use App\Blocks\Base;

class Blocks
{
    private array $blocks = [];

    public function __construct()
    {
        $this->blocks['base'] = fireclass(Base::class);
    }

    public function block(string $key): ?Block
    {
        return ! empty($this->blocks[$key]) ? $this->blocks[$key] : null;
    }
}
