<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdae574d24fb9844199e2f142cf3e9628
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

        spl_autoload_register(array('ComposerAutoloaderInitdae574d24fb9844199e2f142cf3e9628', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdae574d24fb9844199e2f142cf3e9628', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdae574d24fb9844199e2f142cf3e9628::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
