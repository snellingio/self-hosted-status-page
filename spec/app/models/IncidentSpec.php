<?php

include __DIR__ . '/../../bootstrap.php';

describe('Model\Incident', function () {

    it('passes if constructs', function () {

        $object = new Model\Incident();
        expect($object)->toBeA('object');

    });

});
