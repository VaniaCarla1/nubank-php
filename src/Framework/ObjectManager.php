<?php

declare(strict_types = 1);

namespace Nubank\Framework;

/**
 * Class ObjectManager
 * @package Nubank\Framework\DI
 */
class ObjectManager
{
    /**
     * @var array
     */
    private static $resolvedObjects = [];

    /**
     * @param string $class
     * @param array  $parameters
     *
     * @return mixed
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public static function create($class, array $parameters = [])
    {
        return DI\ContainerRepository::getInstance()->make($class, $parameters);
    }

    /**
     * @param string $class
     * @param array  $parameters
     *
     * @return mixed
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public static function get($class, array $parameters = [])
    {
        if (!isset(self::$resolvedObjects[$class])) {
            self::$resolvedObjects[$class] = self::create($class, $parameters);
        }

        return self::$resolvedObjects[$class];
    }
}
