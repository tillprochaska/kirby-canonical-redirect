<?php

it('does not redirect if page has no canonical URL', function () {
    expect($this->get('/without-canonical-url'))->toHaveCode(200);
});

it('redirects to canonical URL', function () {
    expect($this->get('/with-canonical-url'))
        ->toHaveCode(308)
        ->toHaveHeader('Location', 'https://example.org/this-is-the-canonical-url')
    ;
});

it('does not redirect if accessed with canonical URL', function () {
    expect($this->get('/this-is-the-canonical-url'))->toHaveCode(200);
});
