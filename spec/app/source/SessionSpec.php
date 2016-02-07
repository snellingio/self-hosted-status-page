<?php

include __DIR__ . '/../../bootstrap.php';

describe('Source\Session', function () {

    it('passes if constructs', function () {

        $object = new Source\Session();
        expect($object)->toBeA('object');

    });

    it('passes if ->start', function () {

        $object = new Source\Session();
        $start = $object->start();
        expect($start)->toBe(true);

    });

    it('passes if ->set', function () {

        $object = new Source\Session();
        $set = $object->set('test', 'test data');
        expect($set)->toBe(true);

    });

    it('passes if ->get', function () {

        $object = new Source\Session();
        $get = $object->get('test');
        expect($get)->toEqual('test data');

    });

    it('passes if ->all', function () {

        $object = new Source\Session();
        $all = $object->all();
        expect($all)->toBeA('array');

    });

});
