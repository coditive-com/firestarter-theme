<?php

namespace App\Blocks;

use App\Blocks\Block;

class Base extends Block
{
    public function __construct()
    {
        $this->setId('base');
        $this->setName('Base');
        $this->setStructure([
            'post' => null,
        ]);
        $this->setGlobal(true);
    }

    public function parse(array $fields): array
    {
        $data = array_replace_recursive($fields, $this->getStructure());
        $data = apply_filters('firestarter_blocks_base_data', $data);

        return $data;
    }
}
