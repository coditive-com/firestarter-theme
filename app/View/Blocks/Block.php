<?php

namespace App\View\Blocks;

use function Roots\bundle;

abstract class Block
{
    private string $id = '';

    private string $name = '';

    private string $path = '';

    private array $structure = [];

    private bool $global = false;

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
        $data = apply_filters('firestarter_block_data', $data, $this);
        echo view($this->getTemplate(), $this->parse($data))->render();
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

    final public function hasId(): bool
    {
        return ! empty($this->getId());
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final protected function setName(string $id): void
    {
        $this->name = $id;
    }

    final public function hasName(): bool
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

    final public function getTemplate(): string
    {
        return APP_RESOURCES_PATH . sprintf('/blocks/%s/template.blade.php', $this->getId());
    }

    final protected function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    final public function hasTemplate(): bool
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
