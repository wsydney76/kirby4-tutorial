<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen.
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */

use site\twigextensions\SiteExtension;

$isDev = $_SERVER['ENVIRONMENT'] === 'dev';
$isProd = $_SERVER['ENVIRONMENT'] === 'production';

$custom = require __DIR__ . '/custom.php';

return [
    'debug' => $isDev,

//    'cache' => [
//        'pages' => [
//            'active' => true,
//            'ignore' => function ($page) {
//                return $page->title()->value() === 'Do not cache me';
//            }
//        ]
//    ],

    'languages' => true,
    'languages.detect' => true,

    'panel.css' => 'assets/css/custom-panel.css',

    'thumbs' => [
        'format' => 'webp'
    ],

    'wearejust.twig.env.extensions' => [
        'site' => SiteExtension::class
    ],
    'wearejust.twig.cache' => $isProd,

    'custom' => require __DIR__ . '/custom.php'

];

