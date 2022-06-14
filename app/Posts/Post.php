<?php

namespace App\Posts;

class Post
{
    private int $id = 0;

    private string $title = '';

    private string $url = '';

    public function __construct(int $id)
    {
        if ('post' !== get_post_type($id)) {
            return;
        }

        $this->setId($id)
            ->setTitle(get_the_title($id))
            ->setUrl(get_permalink($id));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function hasId(): bool
    {
        return ! empty($this->getId());
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function hasTitle(): bool
    {
        return ! empty($this->getTitle());
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function hasUrl(): bool
    {
        return ! empty($this->getUrl());
    }
}
