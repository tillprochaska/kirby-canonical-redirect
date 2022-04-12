<?php

namespace TillProchaska\KirbyImageOptimizer\Tests;

use TillProchaska\KirbyTestUtils\TestCase as BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class TestCase extends BaseTestCase
{
    protected function kirbyProps(): array
    {
        return [
            'roots' => [
                'index' => __DIR__.'/support/kirby',
            ],
        ];
    }
}
