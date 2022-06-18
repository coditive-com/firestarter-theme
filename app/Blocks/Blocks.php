<?php

namespace App\Blocks;

use App\Blocks\Block;

class Blocks
{
    private array $blocks = [];

    /**
     * @action after_setup_theme
     */
    public function init(): void
    {
        $blocks = array_diff(scandir(FIRESTARTER_PATH . '/app/Blocks'), ['..', '.', 'Block.php', 'Blocks.php', 'Base.php']);
        foreach ($blocks as $name) {
            $block = fireclass('App\Blocks\\' . str_replace('.php', '', $name));
            $this->blocks[$block->getId()] = $block;
        }
    }

    public function get(string $key): ?Block
    {
        return ! empty($this->blocks[$key]) ? $this->blocks[$key] : null;
    }

    /**
     * @return Block[]
     */
    public function getAll(): array
    {
        return $this->blocks;
    }
}
