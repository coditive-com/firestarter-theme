<?php

namespace App\View\Blocks;

use App\View\Blocks\Block;

class Testimonial extends Block
{
    public function __construct()
    {
        $this->setId('testimonial');
        $this->setName('Testimonial');
        $this->setStructure([]);
    }

    public function parse(array $data): array
    {
        $data = array_replace_recursive($data, $this->getStructure());
        $data = apply_filters('firestarter_block_testimonial_data', $data);

        dump($data);

        return $data;
    }
}
