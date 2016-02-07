<?php

include __DIR__ . '/../../bootstrap.php';

describe('Controller\Page\Rss', function () {

    it('passes if constructs', function () {

        $object = new Controller\Page\Rss();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Page\Rss();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
