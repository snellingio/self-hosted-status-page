<?php

include __DIR__ . '/../../bootstrap.php';

describe('Model\Component', function () {

    it('passes if constructs', function () {

        $object = new Model\Component();
        expect($object)->toBeA('object');

    });

});
