<?php

namespace App\Core;

class ACF
{
    /**
     * @action template_redirect
     */
    public function sendMail(): void
    {
        dump('test');
    }

    /**
     * @filter the_title
     */
    public function setTitle(string $title): string
    {
        return $title;
    }

    /**
     * @shortcode title
     */
    public function shortcode(): string
    {
        return get_the_title();
    }
}
