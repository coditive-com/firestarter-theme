<?php

namespace App;

use App\Core\Singleton;
use App\Blocks\Blocks;
use App\Posts\Posts;

define('FIRESTARTER_VERSION', '1.0.0');
define('FIRESTARTER_PATH', dirname(__FILE__, 2));
define('FIRESTARTER_FILE', FIRESTARTER_PATH . '/functions.php');
define('FIRESTARTER_ASSETS_PATH', FIRESTARTER_PATH . '/public');
define('FIRESTARTER_RESOURCES_PATH', FIRESTARTER_PATH . '/resources');
define('FIRESTARTER_ASSETS_URI', get_stylesheet_directory_uri() . '/public');
define('FIRESTARTER_RESOURCES_URI', get_stylesheet_directory_uri() . '/resources');

class App extends Singleton
{
    private Blocks $blocks;

    private Posts $posts;

    protected function __construct()
    {
        $this->blocks = fireclass(Blocks::class);
        $this->posts = fireclass(Posts::class);
    }

    public function blocks(): Blocks
    {
        return $this->blocks;
    }

    public function posts(): Posts
    {
        return $this->posts;
    }
}
