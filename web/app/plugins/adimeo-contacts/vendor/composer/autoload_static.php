<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit302351cb9885a40db43301b003821fa7
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Adimeo\\Contacts\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Adimeo\\Contacts\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Adimeo\\Contacts\\ACF\\Loader' => __DIR__ . '/../..' . '/src/ACF/Loader.php',
        'Adimeo\\Contacts\\Plugin' => __DIR__ . '/../..' . '/src/Plugin.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit302351cb9885a40db43301b003821fa7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit302351cb9885a40db43301b003821fa7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit302351cb9885a40db43301b003821fa7::$classMap;

        }, null, ClassLoader::class);
    }
}
