<?php

include __DIR__ . '/../bootstrap.php';

describe('Configuration\Definitions', function () {

    it('passes if constructs', function () {

        $object = new Configuration\Definitions();
        expect($object)->toBeA('object');

    });

});
