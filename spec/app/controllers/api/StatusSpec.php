<?php

include __DIR__ . '/../../../bootstrap.php';

describe('Controller\Api\Status', function () {

    it('passes if constructs', function () {

        $object = new Controller\Api\Status();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Api\Status();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
