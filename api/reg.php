<?php
include('./base.php');
$res = $Admin->math('COUNT','id',['acc'=>$_POST['acc']]);

if($res == 0){
    $Admin->save(['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']]);
    echo 1;
}else{
    echo 0;
}

?>