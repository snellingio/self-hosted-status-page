<?php

include __DIR__ . '/../../bootstrap.php';

describe('Model\Page', function () {

    it('passes if constructs', function () {

        $object = new Model\Page();
        expect($object)->toBeA('object');

    });

});
