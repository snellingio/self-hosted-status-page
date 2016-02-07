<?php

include __DIR__ . '/../../bootstrap.php';

describe('Source\Database', function () {

    $this->table = 'TEST_TABLE';

    it('passes if constructs', function () {

        $object = new Source\Database($this->table);
        expect($object)->toBeA('object');

    });

    it('passes if ->set', function () {

        $object = new Source\Database($this->table);
        $set = $object->set('test', 'test data');
        $set = $object->set('test2', 'test data');
        expect($set)->toEqual(true);

    });

    it('passes if ->get', function () {

        $object = new Source\Database($this->table);
        $get = $object->get('test');
        expect($get)->toEqual('test data');

    });

    it('passes if ->getKeys', function () {

        $object = new Source\Database($this->table);
        $keys = $object->getKeys();
        $exists = in_array('test', $keys);
        expect($exists)->toEqual(true);

    });

    it('passes if ->delete', function () {

        $object = new Source\Database($this->table);
        $num = $object->delete('test');
        expect($num)->toEqual(1);

    });

    it('passes if ->flush', function () {

        $object = new Source\Database($this->table);
        $num = $object->flush();
        expect($num)->toEqual(1);

    });

});
