<fieldset class="p-20">
<legend>目前位置 : 首頁 > 問卷調查</legend>
<table class="w-90 aut">
    <tr class="ct">
        <td style="width: 8%;">編號</td>
        <td>問卷題目</td>
        <td class="w-10">投票總數</td>
        <td class="w-10">結果</td>
        <td class="w-10">狀態</td>
    </tr>
    <?php
    $rows = $Que->all(['sh'=>1]);
    foreach ($rows as $key => $row) {
        ?>
    <tr>
        <td class="ct">
            <?=$key+1?>.
        </td>
        <td>
            <?=$row['text']?>
        </td>
        <td class="ct">
        <?=$row['sum']?>
        </td>
        <td class="ct">
            <a href="?do=res&id=<?=$row['id']?>">結果</a>
        </td>
        <td class="ct">
        <?php
                if(isset($_SESSION['user'])){

                ?>
                    <a href="?do=vote&id=<?=$row['id']?>">參與投票</a>

                <?php
                    }else{
                ?>
                請先登入
                <?php
                    
                }
                ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
</fieldset>