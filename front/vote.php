<?php
$que = $Que->find($_GET['id']);
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
?>
<p>
    <input type="radio" name="opt" id="opt" value="<?=$opt['id']?>"><?=$opt['text']?>
</p>
<?php
}
?>
<div class="ct">
    <input type="hidden" name="id" value="<?=$que['id']?>">
    <input type="submit" value="我要投票">
</div>
</form>
</fieldset>
