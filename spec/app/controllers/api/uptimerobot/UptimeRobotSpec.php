<?php

include __DIR__ . '/../../../../bootstrap.php';

describe('Controller\Api\UptimeRobot', function () {

    it('passes if constructs', function () {

        $object = new Controller\Api\UptimeRobot();
        expect($object)->toBeA('object');

    });

    it('passes if ->get', function () {

        $object = new Controller\Api\UptimeRobot();
        $get = $object->get();
        expect($get)->toBe(true);

    });

});
