<?php

// TODO: Check image sizes. Just PoC quality for now.

return [
    'cardsPerPage' => 12,

    'transforms' => [
        'card' => ['width' => 400, 'height' => 200],
        'featuredImage' => $featureImageTransform = ['width' => 1200, 'height' => 450, 'crop' => true],

        // Using the same transform for both default and wide width for simplicity
        'blockImage' => [
            'defaultHeight' => $blockImageDefaultHeightTransform = ['width' => 960, 'height' => 540, 'crop' => true],
            'fullHeight' => $blockImageFullHeightTransform = ['width' => 960],
        ],

        'layoutImage' => $layoutImageTransform = ['width' => 1200, 'height' => 450, 'crop' => true]
    ],

    'srcsets' => [
        'featuredImage' => [
            '1200w' => $featureImageTransform,
            '800w' => ['width' => 800, 'height' => 300, 'crop' => true],
            '400w' => ['width' => 400, 'height' => 150, 'crop' => true],
        ],
        'blockImage' => [
            'defaultHeight' => [
                '960w' => $blockImageDefaultHeightTransform,
                '480w' => ['width' => 480, 'height' => 270, 'crop' => true],
            ],
            'fullHeight' => [
                '960w' => $blockImageFullHeightTransform,
                '480w' => ['width' => 480],
            ],
        ],
        'layoutImage' => [
            '1200w' => $layoutImageTransform,
            '1024w' => ['width' => 1024, 'height' => 450, 'crop' => true],
            '800w' => ['width' => 800, 'height' => 450, 'crop' => true],
            '400w' => ['width' => 400, 'height' => 250, 'crop' => true],
        ],
    ]

];
