<?php

include __DIR__ . '/../../bootstrap.php';

describe('Controller\Page\History', function () {

    it('passes if constructs', function () {

        $object = new Controller\Page\History();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Page\History();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
