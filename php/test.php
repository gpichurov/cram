<?php
/**
 * Created by @testPhpStorm.
 * User: georgi
 * Date: 16.03.16
 * Time: 18:39
 */
require_once realpath(__DIR__ . '/autoload.php');
$user = new Users('Test', 'test', 'test@test.com');
DbStorage::insertObject($user);