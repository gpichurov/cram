<?php

/**
 * Created by PhpStorm.
 * User: georgi
 * Date: 16.03.16
 * Time: 18:09
 */
interface IDBStorable
{
    // ['id' => 5, 'name' => 'Ivan', 'age' => 35]
    public function getFields();

    // id, key ...
    public function getPrimaryKeyName();

    public function getPrimaryKeyValue();

    // users
    public function getTableName();

    public function setFieldsFromDb($fieldValues);

    public function setPrimaryKeyValue($value);
}