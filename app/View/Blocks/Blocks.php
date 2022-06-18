<?php

namespace App\View\Blocks;

use App\View\Blocks\Block;

class Blocks
{
    private array $blocks = [];

    /**
     * @action after_setup_theme
     */
    public function init(): void
    {
        $blocks = array_diff(scandir(APP_PATH . '/app/View/Blocks'), ['..', '.', 'Block.php', 'Blocks.php', 'Base.php']);
        foreach ($blocks as $name) {
            $block = fireclass('App\View\Blocks\\' . str_replace('.php', '', $name));
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
