<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdae574d24fb9844199e2f142cf3e9628
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdae574d24fb9844199e2f142cf3e9628::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdae574d24fb9844199e2f142cf3e9628::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdae574d24fb9844199e2f142cf3e9628::$classMap;

        }, null, ClassLoader::class);
    }
}
