<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita39b222a4e57ed16944ade58f8ed223b
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInita39b222a4e57ed16944ade58f8ed223b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita39b222a4e57ed16944ade58f8ed223b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita39b222a4e57ed16944ade58f8ed223b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
