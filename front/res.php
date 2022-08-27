<?php
$que = $Que->find($_GET['id']);
if($que['sum'] == 0){
    $que['sum'] = 1;
}
$opts = $Opt->all(['parent_id'=>$_GET['id']]);
?>
<fieldset class="p-20">
<legend>目前位置 : 首頁 > 問卷調查 > <?=$que['text']?></legend>
<p>
    <b>
    <?=$que['text']?>
    </b>
</p>

<form action="./api/vote.php" method="post">
<?php
foreach ($opts as $key => $opt) {
    
    $width = round(($opt['sum']/$que['sum'])*100,0);
?>
<div class="d-f" style="padding: 10px 0;">
    <div class="w-40">
        <?=($key+1).'.'.$opt['text']?>
    </div>
    <div class="w-60 d-f">
        <div class="div" style="background-color: #ddd;height:25px ; width:<?=$width?>%"></div>
        <span><?=$opt['sum']?>票(<?=$width?>)%</span>
    </div>
</div>
<?php
}
?>
<div class="ct">
    <input type="button" value="返回" onclick="location.href='?do=que'">
</div>

</fieldset>
