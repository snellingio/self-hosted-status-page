<?php

include __DIR__ . '/../../bootstrap.php';

describe('Service\Webhook', function () {

    it('passes if constructs', function () {

        $object = new Service\Webhook();
        expect($object)->toBeA('object');

    });

});
