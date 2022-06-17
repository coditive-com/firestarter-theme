<?php

namespace App\Blocks;

use function Roots\bundle;

abstract class Block
{
    private string $id = '';

    private string $name = '';

    private string $path = '';

    private array $structure = [];

    private bool $global = false;

    /**
     * @_action acf/init
     */
    // public function init(): void
    // {
    //     if (! function_exists('acf_register_block_type')) {
    //         return;
    //     }

    //     if (! $this->hasId() || ! $this->hasName() || ! $this->hasTemplate()) {
    //         return;
    //     }

    //     acf_register_block_type([
    //         'name'  => $this->getId(),
    //         'title' => $this->getName(),
    //         'render_callback' => [$this, 'render'],
    //     ]);
    // }

    /**
     * @action init
     */
    final public function init(): void
    {
        if ($this->isGlobal()) {
            add_action('wp_enqueue_scripts', [$this, 'assets']);
        }
    }

    final public function render(array $data = []): void
    {
        $this->assets();
        $data = isset($data['render_callback']) ? get_fields() : $data;
        echo view($this->getTemplate(), $this->parse($data['data'] ?? []))->render();
    }

    final public function get(array $data = []): string
    {
        ob_start();
        $this->render($data);

        return ob_get_clean();
    }

    final public function assets(): void
    {
        bundle(sprintf('block-%s', $this->getId()))->enqueue();
    }

    final public function check(): void
    {
        dump($this->getStructure());
    }

    protected function parse(array $data): array
    {
        return $data;
    }

    final public function getId(): string
    {
        return $this->id;
    }

    final protected function setId(string $id): void
    {
        $this->id = $id;
    }

    final protected function hasId(): bool
    {
        return ! empty($this->getId());
    }

    final protected function getName(): string
    {
        return $this->name;
    }

    final protected function setName(string $id): void
    {
        $this->name = $id;
    }

    final protected function hasName(): bool
    {
        return ! empty($this->getName());
    }

    final protected function getPath(): string
    {
        return $this->path;
    }

    final protected function setPath(string $path): void
    {
        $this->path = $path;
    }

    final protected function hasPath(): bool
    {
        return ! empty($this->getPath());
    }

    final protected function getTemplate(): string
    {
        return FIRESTARTER_RESOURCES_PATH . sprintf('/blocks/%s/template.blade.php', $this->getId());
    }

    final protected function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    final protected function hasTemplate(): bool
    {
        return ! empty($this->getTemplate());
    }

    final protected function getStructure(): array
    {
        return $this->structure;
    }

    final protected function setStructure(array $structure): void
    {
        $this->structure = $structure;
    }

    final protected function hasStructure(): bool
    {
        return ! empty($this->getStructure());
    }

    final protected function getGlobal(): bool
    {
        return $this->global;
    }

    final protected function setGlobal(bool $global): void
    {
        $this->global = $global;
    }

    final protected function isGlobal(): bool
    {
        return $this->global;
    }
}
