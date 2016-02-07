<?php

include __DIR__ . '/../../../bootstrap.php';

describe('Controller\Api\Single', function () {

    it('passes if constructs', function () {

        $object = new Controller\Api\Single();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Api\Single();
        $get = $object->get('123');
        expect($get)->toBe(true);

    });

});
