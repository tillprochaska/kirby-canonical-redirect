<?php

return [
    'url' => 'https://example.org',
    'routes' => [
        [
            'pattern' => '/this-is-the-canonical-url',
            'action' => function () {
                return page('/with-canonical-url');
            },
        ],
    ],
];
