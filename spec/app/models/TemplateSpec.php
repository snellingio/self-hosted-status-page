<?php

include __DIR__ . '/../../bootstrap.php';

describe('Model\Template', function () {

    it('passes if constructs', function () {

        $object = new Model\Template();
        expect($object)->toBeA('object');

    });

});
