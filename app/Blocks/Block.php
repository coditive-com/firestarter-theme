<?php

namespace App\Blocks;

use function Roots\bundle;

abstract class Block
{
    private string $id = '';

    private string $name = '';

    private string $path = '';

    protected array $structure = [];

    protected bool $global = false;

    /**
     * @action acf/init
     */
    public function init(): void
    {
        if (! function_exists('acf_register_block_type')) {
            return;
        }

        if (! $this->hasId() || ! $this->hasName() || ! $this->hasTemplate()) {
            return;
        }

        acf_register_block_type([
            'name'  => $this->getId(),
            'title' => $this->getName(),
            'render_callback' => [$this, 'render'],
        ]);

        if ($this->isGlobal()) {
            add_action('wp_enqueue_scripts', [$this, 'assets']);
        }
    }

    public function render(array $data = []): void
    {
        $this->assets();
        $data = isset($data['render_callback']) ? get_fields() : $data;
        echo view($this->getTemplate(), $this->parse($data['data'] ?? []))->render();
    }

    public function print(array $data = []): void
    {
        $this->render(['data' => $data]);
    }

    public function get(array $data = []): string
    {
        ob_start();
        $this->print($data);

        return ob_get_clean();
    }

    public function parse(array $data): array
    {
        return $data;
    }

    public function assets(): void
    {
        bundle(sprintf('block-%s', $this->getId()))->enqueue();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function hasId(): bool
    {
        return ! empty($this->getId());
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $id): void
    {
        $this->name = $id;
    }

    public function hasName(): bool
    {
        return ! empty($this->getName());
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function hasPath(): bool
    {
        return ! empty($this->getPath());
    }

    public function getTemplate(): string
    {
        return FIRESTARTER_RESOURCES_PATH . sprintf('/blocks/%s/template.blade.php', $this->getId());
    }

    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    public function hasTemplate(): bool
    {
        return ! empty($this->getTemplate());
    }

    public function getStructure(): array
    {
        return $this->structure;
    }

    public function setStructure(array $structure): void
    {
        $this->structure = $structure;
    }

    public function hasStructure(): bool
    {
        return ! empty($this->getStructure());
    }

    public function getGlobal(): bool
    {
        return $this->global;
    }

    public function setGlobal(bool $global): void
    {
        $this->global = $global;
    }

    public function isGlobal(): bool
    {
        return $this->global;
    }

    public function useVue(): void
    {
        $this->vue = true;
    }

    public function useSelect2(): void
    {
        $this->select2 = true;
    }
}
