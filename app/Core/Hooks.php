<?php

namespace App\Core;

use App\Core\Singleton;

class Hooks extends Singleton
{
    protected array $calledHooks = [];

    protected string $hooksPattern = '#\* @(?P<type>filter|action|shortcode)\s+(?P<name>[a-z0-9\=\-\.\/_]+)(\s+(?P<priority>\d+))?#';

    public function addFilter(string $name, array $callback, array $args = [])
    {
        return $this->addHook('filter', $name, $callback, array_merge([
            'priority' => 10,
            'arg_count' => PHP_INT_MAX
        ], $args));
    }

    public function addAction(string $name, array $callback, array $args = [])
    {
        return $this->addHook('action', $name, $callback, array_merge([
            'priority' => 10,
            'arg_count' => PHP_INT_MAX
        ], $args));
    }

    public function addShortcode(string $name, array $callback)
    {
        return $this->addHook('shortcode', $name, $callback);
    }

    public function wrapHooks(object $object = null): object
    {
        if (is_null($object)) {
            $object = $this;
        }

        $class_name = get_class($object);

        if (isset($this->calledHooks[$class_name])) {
            return $object;
        }

        $this->calledHooks[$class_name] = true;
        $reflector = new \ReflectionObject($object);

        foreach ($reflector->getMethods() as $method) {
            $doc = $method->getDocComment();
            $arg_count = $method->getNumberOfParameters();

            if (preg_match_all($this->hooksPattern, $doc, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $match) {
                    $type = ucfirst($match['type']);
                    $name = $match['name'];

                    $priority = empty($match['priority']) ? 10 : intval($match['priority']);
                    $callback = [$object, $method->getName()];

                    call_user_func([$this, "add{$type}"], $name, $callback, compact('priority', 'arg_count'));
                }
            }
        }

        return $object;
    }

    /**
     * @return mixed Returns the return value of the callback.
     */
    protected function addHook(string $type, string $name, array $callback, array $args = [])
    {
        $function = sprintf('\add_%s', $type);
        $priority = isset($args['priority']) ? $args['priority'] : 10;
        $arg_count = isset($args['arg_count']) ? $args['arg_count'] : PHP_INT_MAX;

        return call_user_func($function, $name, $callback, $priority, $arg_count);
    }
}
