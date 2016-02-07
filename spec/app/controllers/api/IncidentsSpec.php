<?php

include __DIR__ . '/../../../bootstrap.php';

describe('Controller\Api\Incidents', function () {

    it('passes if constructs', function () {

        $object = new Controller\Api\Incidents();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Api\Incidents();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
