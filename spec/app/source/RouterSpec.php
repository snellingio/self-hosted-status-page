<?php

include __DIR__ . '/../../bootstrap.php';

describe('Source\Router', function () {

    it('passes if constructs', function () {

        $object = new Source\Router();
        expect($object)->toBeA('object');

    });

    it('passes if ->path', function () {

        $object = new Source\Router();
        $path = $object->path();
        expect($path)->toBeA('string');

    });

    it('passes if ->serve', function () {

        $object = new Source\Router();
        $routes = (new Configuration\Routes)->load();
        Kahlan\Plugin\Stub::on($object)->method('output')->andReturn(true);
        $response = $object->serve($routes);

        //expect($response)->toBe(true);

    });

});
