<?php

namespace App\Blocks;

class Blocks
{
    private array $blocks = [];

    /**
     * @action after_setup_theme
     */
    public function init(): void
    {
        $blocks = array_diff(scandir(FIRESTARTER_PATH . '/app/Blocks'), ['..', '.', 'Block.php', 'Blocks.php']);
        foreach ($blocks as $name) {
            $block = fireclass('App\Blocks\\' . str_replace('.php', '', $name));
            $this->blocks[$block->getId()] = $block;
        }
    }

    public function block(string $key): ?Block
    {
        return ! empty($this->blocks[$key]) ? $this->blocks[$key] : null;
    }
}
