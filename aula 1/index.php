<?php

$a = $_SERVER['PHP_SELF'] . "<br>";
$b = $_SERVER['SERVER_NAME'] . "<br>";
$c = $_SERVER['REMOTE_ADDR'] . "<br>";

echo "teste de PHP" . "<br>" . $a . $b . $c;

//echo $_SERVER['REMOTE_HOST'];