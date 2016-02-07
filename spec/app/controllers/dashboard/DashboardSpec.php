<?php

include __DIR__ . '/../../../bootstrap.php';

describe('Controller\Dashboard\Dashboard', function () {

    it('passes if constructs', function () {

        $object = new Controller\Dashboard\Dashboard();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Dashboard\Dashboard();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
