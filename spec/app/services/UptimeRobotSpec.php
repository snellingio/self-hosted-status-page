<?php

include __DIR__ . '/../../bootstrap.php';

describe('Service\UptimeRobot', function () {

    it('passes if constructs', function () {

        $object = new Service\UptimeRobot();
        expect($object)->toBeA('object');

    });

});
