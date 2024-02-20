<?php
$s = "123";

$hash1 = md5($s);
echo $hash1 . "\n";
$hash1 = md5("");
echo $hash1 . "\n";
$hash1 = md5($s);
echo $hash1 . "\n";
