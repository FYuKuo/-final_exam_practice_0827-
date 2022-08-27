<?php
include('./base.php');
$_POST['good'] = 0;
$_POST['sh'] = 1;

$News->save($_POST);
?>