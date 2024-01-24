<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen.
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */

use site\twigextensions\SiteExtension;

// Environment as set in .env file
$isDev = $_SERVER['ENVIRONMENT'] === 'dev';
$isProd = $_SERVER['ENVIRONMENT'] === 'production';

return [
    // Enable debug mode in dev environment
    'debug' => $isDev,

//    Enable page cache in production
//    'cache' => [
//        'pages' => [
//            'active' => $isProd,
//            'ignore' => function($page) {
//                return $page->title()->value() === 'Do not cache me';
//            }
//        ]
//    ],


    // Enable multi-language support
    'languages' => true,
    'languages.detect' => true,

    // Enable panel css customization
    'panel.css' => 'assets/css/custom-panel.css',

    // Create thumbs in webp format
    'thumbs' => [
        'format' => 'webp'
    ],

    // Enable custom twig extension
    'wearejust.twig.env.extensions' => [
        'site' => SiteExtension::class
    ],

    // Enable twig cache in production
    // Note: This requires that the storage/cache/twig folder has to be deleted after every template change!
    'wearejust.twig.cache' => $isProd,

    // pull in custom config
    'custom' => require __DIR__ . '/custom.php'

];

