<?php

include __DIR__ . '/../bootstrap.php';

describe('Configuration\Routes', function () {

    it('passes if constructs', function () {

        $object = new Configuration\Routes();
        expect($object)->toBeA('object');

    });

    it('passes if loads', function () {

        $object = new Configuration\Routes();
        $routes = $object->load();
        expect($routes)->toBeA('array');

    });

});
