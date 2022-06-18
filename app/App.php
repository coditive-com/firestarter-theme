<?php

namespace App;

use App\Core\Singleton;
use App\CLI\CLI;
use App\Integrations\Integrations;
use App\Posts\Posts;
use App\View\Blocks\Blocks;
use App\View\Blocks\Block;

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

    private Integrations $integrations;

    private Posts $posts;

    protected function __construct()
    {
        fireclass(CLI::class);

        $this->blocks = fireclass(Blocks::class);
        $this->integrations = fireclass(Integrations::class);
        $this->posts = fireclass(Posts::class);
    }

    public function blocks(): Blocks
    {
        return $this->blocks;
    }

    public function block(string $id): ?Block
    {
        return $this->blocks->get($id);
    }

    public function integrations(): Integrations
    {
        return $this->integrations;
    }

    public function posts(): Posts
    {
        return $this->posts;
    }
}
