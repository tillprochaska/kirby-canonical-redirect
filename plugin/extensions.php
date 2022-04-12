<?php

use Kirby\Cms\Page;
use Kirby\Cms\Response;
use Kirby\Http\Route;
use Kirby\Http\Uri;

return [
    'hooks' => [
        'route:after' => function (Route $route, string $path, string $method, mixed $result, bool $final) {
            if (!$final || !is_a($result, Page::class) || is_a($result, ErrorPage::class)) {
                return $result;
            }

            $canonicalUrl = $result->canonicalUrl();

            if (!is_string($canonicalUrl)) {
                $canonicalUrl = $result->url();
            }

            $canonicalUrl = new Uri($canonicalUrl);

            // Handle draft previews
            if ($token = kirby()->request()->query()->get('token')) {
                $canonicalUrl->setQuery(['token' => $token]);
            }

            if ($canonicalUrl->path()->toString() !== kirby()->request()->url()->path()->toString()) {
                return Response::redirect($canonicalUrl, 308);
            }

            return $result;
        },
    ],
];
