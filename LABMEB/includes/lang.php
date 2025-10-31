<?php
session_start();
$default_lang = 'es';

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
} elseif (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    $lang = $default_lang;
}

$lang_file = __DIR__ . "/../lang/$lang.php";
if (file_exists($lang_file)) {
    $translations = include($lang_file);
} else {
    $translations = include(__DIR__ . "/../lang/$default_lang.php");
}
