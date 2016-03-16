<?php

/**
 * Created by PhpStorm.
 * User: georgi
 * Date: 16.03.16
 * Time: 17:51
 */
class DbStorage
{
    const DB_HOST = 'localhost';
    const DB_NAME = 'Cram';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    private static $connection;

    public static function getConnection()
    {
        if (is_null(self::$connection)) {
            self::$connection = self::makeConnection();
        }

        return self::$connection;
    }

    private static function makeConnection()
    {
        $pdo = new PDO(sprintf('mysql:host=%s;dbname=%s', self::DB_HOST, self::DB_NAME), self::DB_USER, self::DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public static function query($sql, $params = null)
    {
        var_dump($sql, $params);
        $statement = self::getConnection()->prepare($sql);

        $statement->execute($params);

        if (stripos($sql, 'select') === 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        if (stripos($sql, 'insert') === 0) {
            return self::getConnection()->lastInsertId();
        }

        if (stripos($sql, 'update') === 0 || stripos($sql, 'delete') === 0) {
            return $statement->rowCount();
        }

        throw  new InvalidArgumentException('Expected select, insert, update or delete sql ' . $sql . ' received');
    }

    public static function selectObject(IDBStorable $object)
    {
        // select * from cram_cards where id = ?
        $sql = sprintf('SELECT * FROM %s WHERE %s = ?', $object->getTableName(), $object->getPrimaryKeyName());
        $data = self::query($sql, [$object->getPrimaryKeyValue()]);

        if ($data) {
            $object->setFieldsFromDb($data[0]);
        }
    }

    public static function insertObject(IDBStorable $object)
    {
        //insert into cram_cards (name, value) values ('Super', 'Qko')
        //insert into cram_cards (name, value) values (?, ?)
        $fields = $object->getFields();
        unset($fields[$object->getPrimaryKeyName()]);
        $questionMarks = implode(', ', array_fill(0, count($fields), '?'));
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $object->getTableName(),  implode(', ', array_keys($fields)), $questionMarks);

        $result = self::query($sql, array_values($fields));

        $object->setPrimaryKeyValue($result);
    }

    public static function updateObject(IDBStorable $object)
    {
        if (!$object->getPrimaryKeyValue()) {
            throw new InvalidArgumentException('This object does not have primary key value');
        }
        //update cram_cards SET name =? SET value = ? WHERE id = ?
        $fields = $object->getFields();
        unset($fields[$object->getPrimaryKeyName()]);
        $sets = '';

        foreach ($fields as $key => $value) {
            $sets .= 'SET ' . $key . ' = ? ';
        }
        $sql = sprintf('UPDATE %s %s WHERE %s = ?', $object->getTableName(), $sets, $object->getPrimaryKeyName());

        $params = array_values($fields);
        $params[] = $object->getPrimaryKeyValue();
        $result = self::query($sql, $params);

        return $result;
    }

    public static function deleteObject(IDBStorable $object)
    {
        if (!$object->getPrimaryKeyValue()) {
            throw new InvalidArgumentException('This object does not have primary key value');
        }

        $sql = sprintf('DELETE FROM %s WHERE %s = ?', $object->getTableName(), $object->getPrimaryKeyName());
        return self::query($sql, [$object->getPrimaryKeyValue()]);
    }








}