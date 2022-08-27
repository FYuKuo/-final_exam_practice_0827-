<?php
include('./base.php');
if(!empty($_POST['name'])){

    $Que->save(['text'=>$_POST['name'],'sum'=>0,'sh'=>1]);
    $queid = $Que->find(['text'=>$_POST['name']])['id'];
    
    foreach ($_POST['opts'] as $key => $opt) {
        if($opt != ''){
            $Opt->save(['parent_id'=>$queid,'text'=>$opt,'sum'=>0]);
        }
    }
}

to('../back.php?do=que');
?>