<?php

use Kirby\Cms\Page;

class WithCanonicalUrlPage extends Page
{
    public function canonicalUrl(): string
    {
        return 'https://example.org/this-is-the-canonical-url';
    }
}
