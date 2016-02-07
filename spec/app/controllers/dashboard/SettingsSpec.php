<?php

include __DIR__ . '/../../../bootstrap.php';

describe('Controller\Dashboard\Settings', function () {

    it('passes if constructs', function () {

        $object = new Controller\Dashboard\Settings();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Dashboard\Settings();
        $get = $object->get('123');
        expect($get)->toBe(true);

    });

});
