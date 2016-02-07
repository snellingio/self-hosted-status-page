<?php

include __DIR__ . '/../../../bootstrap.php';

describe('Controller\Dashboard\Components', function () {

    it('passes if constructs', function () {

        $object = new Controller\Dashboard\Components();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Dashboard\Components();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
