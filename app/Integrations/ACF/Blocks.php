<?php

namespace App\Integrations\ACF;

class Blocks
{
    /**
     * @action acf/init
     */
    public function initBlocks(): void
    {
        if (! function_exists('acf_register_block_type')) {
            return;
        }

        foreach (firestarter()->blocks()->getAll() as $block) {
            acf_register_block_type([
                'name'  => $block->getId(),
                'title' => $block->getName(),
                'render_callback' => [$block, 'render'],
            ]);
        }
    }

    /**
     * @filter firestarter_block_data
     */
    public function setData(array $data): array
    {
        if (! function_exists('get_fields')) {
            return $data;
        }

        if (empty($data['render_callback'])) {
            return $data;
        }

        if (empty($data['name']) || false === strpos($data['name'], 'acf/')) {
            return $data;
        }

        return get_fields() ?: [];
    }
}
