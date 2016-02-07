<?php

include __DIR__ . '/../../bootstrap.php';

describe('Service\Form', function () {

    it('passes if constructs', function () {

        $object = new Service\Form();
        expect($object)->toBeA('object');

    });

});
