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
      ];
  }


  public function siteLogo(): string
  {
    if (function_exists('get_field')) {
      $logoStandard = get_field('s_logo', 'option');
      $logoRetina = get_field('s_logo_retina', 'option');

      if (empty($logoStandard)) {
        return get_bloginfo('name');
      }

      $srcset = '';
      if (! empty($logoStandard) && ! empty($logoRetina)) {
        $srcset = 'srcset="' . $logoStandard . ' 1x, ' . $logoRetina . ' 2x"';
      }

      return '<img src="' . $logoStandard . '" ' . $srcset . ' />';
    }

    return get_bloginfo('name');
  }
}
