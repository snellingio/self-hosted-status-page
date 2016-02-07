<?php

include __DIR__ . '/../../../bootstrap.php';

describe('Controller\Api\Components', function () {

    it('passes if constructs', function () {

        $object = new Controller\Api\Components();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Api\Components();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
