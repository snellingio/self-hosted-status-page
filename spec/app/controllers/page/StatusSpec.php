<?php

include __DIR__ . '/../../bootstrap.php';

describe('Controller\Page\Status', function () {

    it('passes if constructs', function () {

        $object = new Controller\Page\Status();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Page\Status();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
