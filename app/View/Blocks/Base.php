<?php

namespace App\View\Blocks;

use App\View\Blocks\Block;

class Base extends Block
{
    public function __construct()
    {
        $this->setId('base');
        $this->setName('Base');
        $this->setStructure([]);
    }

    public function parse(array $data): array
    {
        $data = array_replace_recursive($data, $this->getStructure());
        $data = apply_filters('firestarter_block_base_data', $data);

        return $data;
    }
}
