<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteLogo' => $this->siteLogo(),
            'siteCopyrights' => $this->siteCopyrights(),
        ];
    }

    public function siteLogo(): string
    {
        $logo = firestarter()->settings()->get('site_logo');
        $logo2x = firestarter()->settings()->get('site_logo_2x');

        if (empty($logo)) {
            return get_bloginfo('name');
        }

        $srcset = '';
        if (! empty($logo) && ! empty($logo2x)) {
            $srcset = 'srcset="' . wp_get_attachment_image_url($logo, 'full') . ' 1x, ' . wp_get_attachment_image_url($logo2x, 'full') . ' 2x"';
        }

        return '<img src="' . wp_get_attachment_image_url($logo, 'full') . '" ' . $srcset . ' />';
    }

    public function siteCopyrights(): string
    {
        $copyrights = firestarter()->settings()->get('site_copyrights');

        return ! empty($copyrights) && is_string($copyrights) ? $copyrights : '';
    }
}
