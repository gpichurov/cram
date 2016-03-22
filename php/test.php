<?php
/**
 * Created by @testPhpStorm.
 * User: georgi
 * Date: 16.03.16
 * Time: 18:39
 */
require_once realpath(__DIR__ . '/autoload.php');
session_start();
$_SESSION['id'] = 1;
$_GET['id'] = 28;
$user = new Users('Test1', 'test1');
$card = new FlashCards('test', 'des', 1);
//var_dump(DbStorage::selectCards());
var_dump(DbStorage::deleteFlashcards());
//var_dump(DbStorage::checkLogin($user));