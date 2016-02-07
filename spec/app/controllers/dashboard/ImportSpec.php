<?php

include __DIR__ . '/../../../bootstrap.php';

describe('Controller\Dashboard\Import', function () {

    it('passes if constructs', function () {

        $object = new Controller\Dashboard\Import();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Dashboard\Import();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
