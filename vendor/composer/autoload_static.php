<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fe69370fa66f137d25ed7ef941ab947
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fe69370fa66f137d25ed7ef941ab947::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fe69370fa66f137d25ed7ef941ab947::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0fe69370fa66f137d25ed7ef941ab947::$classMap;

        }, null, ClassLoader::class);
    }
}
