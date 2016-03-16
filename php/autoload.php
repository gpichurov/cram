<?php
/* function __autoload($className) {
	require_once $className . '.php';
} */


spl_autoload_register(function ($className) {
	require_once __DIR__ . '/classes/' . $className . '.php';
});