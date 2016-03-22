<?php
require_once 'php/autoload.php';
require_once 'php/functions.php';
session_start();

DbStorage::deleteQuestions();
DbStorage::deleteFlashcards();
header('Location: profile.php');
die;