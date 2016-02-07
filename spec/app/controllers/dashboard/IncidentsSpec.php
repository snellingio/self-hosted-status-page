<?php

include __DIR__ . '/../../../bootstrap.php';

describe('Controller\Dashboard\Incidents', function () {

    it('passes if constructs', function () {

        $object = new Controller\Dashboard\Incidents();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Dashboard\Incidents();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
