<?php
include('./base.php');
if($_POST['type'] == 1){
    $Log->save(['que'=>$_POST['id'],'user'=>$_SESSION['user']]);
}else{
    $Log->del(['que'=>$_POST['id'],'user'=>$_SESSION['user']]);
}

unset($_POST['type']);

$News->save($_POST);

?>