<?php

namespace App\Integrations\CLI;

use WP_CLI;
use Illuminate\Support\Str;

class Block
{
    public function create(array $args, array $assoc): void
    {
        try {
            if (empty($assoc['name'])) {
                throw new \Exception('--name attribute must be specified.');
            }

            $data = [
                'name' => $assoc['name'],
                'id' => Str::kebab($assoc['name']),
                'slug' => Str::snake($assoc['name']),
                'class' => Str::studly($assoc['name']),
            ];

            $files = [
                'source' => [
                    APP_PATH . "/app/View/Blocks/Base.php",
                    APP_RESOURCES_PATH . "/blocks/base/scripts.js",
                    APP_RESOURCES_PATH . "/blocks/base/styles.scss",
                    APP_RESOURCES_PATH . "/blocks/base/template.blade.php",
                ],
                'destination' => [
                    APP_PATH . '/app/View/Blocks' . "/{$data['class']}.php",
                    APP_RESOURCES_PATH . "/blocks/{$data['id']}/scripts.js",
                    APP_RESOURCES_PATH . "/blocks/{$data['id']}/styles.scss",
                    APP_RESOURCES_PATH . "/blocks/{$data['id']}/template.blade.php",
                ],
            ];

            $replace = [
                'from' => ["'Base'", 'Base', 'base_data', "base"],
                'to' => ["'{$data['name']}'", "{$data['class']}", "{$data['slug']}_data", $data['id']],
            ];

            if (count($files['source']) !== count(array_filter($files['source'], fn(string $path) => file_exists($path)))) {
                throw new \Exception('Base files are missing.');
            }

            if (! empty(array_filter($files['destination'], fn(string $path) => file_exists($path)))) {
                throw new \Exception('Destination files already exist.');
            }

            mkdir(APP_RESOURCES_PATH . "/blocks/{$data['id']}");

            for ($i = 0; $i < count($files['source']); $i++) {
                copy($files['source'][$i], $files['destination'][$i]);
                file_put_contents($files['destination'][$i], str_replace($replace['from'], $replace['to'], file_get_contents($files['destination'][$i])));
            }

            WP_CLI::success('Block created!');
        } catch (\Throwable $th) {
            WP_CLI::error($th->getMessage());
        }
    }
}
