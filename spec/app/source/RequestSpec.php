<?php

include __DIR__ . '/../../bootstrap.php';

describe('Source\Request', function () {

    it('passes if constructs', function () {

        $object = new Source\Request();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Source\Request();
        $get = $object->get();
        expect($get)->toBeA('array');

    });

    it('passes if ->headers', function () {

        $object = new Source\Request();
        $headers = $object->headers();
        expect($headers)->toBeA('array');

    });

    it('passes if ->pjaxRequest', function () {

        $object = new Source\Request();
        $pjax = $object->pjaxRequest();
        expect($pjax)->toBe(false);

    });

    it('passes if ->post', function () {

        $object = new Source\Request();
        $post = $object->post();
        expect($post)->toBeA('array');

    });

    it('passes if ->server', function () {

        $object = new Source\Request();
        $server = $object->server();
        expect($server)->toBeA('array');

    });

});
