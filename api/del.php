<?php
include('./base.php');
$DB = new DB($_POST['table']);

foreach ($_POST['id'] as $key => $id) {
    $DB->del($id);
}
?>