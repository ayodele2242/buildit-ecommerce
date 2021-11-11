<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbf189837386a45c42580500c01b4b8e9
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Yabacon\\' => 8,
        ),
        'M' => 
        array (
            'Matscode\\Paystack\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Yabacon\\' => 
        array (
            0 => __DIR__ . '/..' . '/yabacon/paystack-php/src',
        ),
        'Matscode\\Paystack\\' => 
        array (
            0 => __DIR__ . '/..' . '/matscode/paystack/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbf189837386a45c42580500c01b4b8e9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbf189837386a45c42580500c01b4b8e9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
