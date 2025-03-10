<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit31deaa14bc976edaa42a4decb34b237b
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit31deaa14bc976edaa42a4decb34b237b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit31deaa14bc976edaa42a4decb34b237b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit31deaa14bc976edaa42a4decb34b237b::$classMap;

        }, null, ClassLoader::class);
    }
}
