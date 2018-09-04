<?php
header('Content-Type: text/html; charset=utf-8');

$res = file_get_contents("https://www.google.com/search?q=gmail");
die($res);