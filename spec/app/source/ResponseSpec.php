<?php

include __DIR__ . '/../../bootstrap.php';

describe('Source\Response', function () {

    it('passes if constructs', function () {

        $object = new Source\Response();
        expect($object)->toBeA('object');

    });

    it('passes if ->html', function () {

        $object = new Source\Response();
        Kahlan\Plugin\Stub::on($object)->method('output')->andReturn(true);
        $result = $object->html('<h1>hi</h1>');
        expect($result)->toBe(true);

    });

    it('passes if ->json', function () {

        $object = new Source\Response();
        Kahlan\Plugin\Stub::on($object)->method('output')->andReturn(true);
        $result = $object->json([]);
        expect($result)->toBe(true);

    });

    it('passes if ->json', function () {

        $object = new Source\Response();
        Kahlan\Plugin\Stub::on($object)->method('output')->andReturn(true);
        $result = $object->xml('<xml></xml>');
        expect($result)->toBe(true);

    });

    it('passes if ->output', function () {

        $object = new Source\Response();
        Kahlan\Plugin\Stub::on($object)->method('output')->andReturn(true);
        $result = $object->output('', []);
        expect($result)->toBe(true);

    });

    it('passes if ->output', function () {

        $object = new Source\Response();
        Kahlan\Plugin\Stub::on($object)->method('output')->andReturn(true);
        $result = $object->output('', []);
        expect($result)->toBe(true);

    });

    it('passes if ->redirect', function () {

        $object = new Source\Response();
        Kahlan\Plugin\Stub::on($object)->method('output')->andReturn(true);
        $result = $object->redirect();
        expect($result)->toBe(true);

    });

    it('passes if ->render', function () {

        $object = new Source\Response();
        Kahlan\Plugin\Stub::on($object)->method('output')->andReturn(true);
        $result = $object->render('_test');
        expect($result)->toBe(true);

    });

});
