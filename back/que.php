<fieldset class="p-20">
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
    <div class="d-f">
        <div class="clo w-20">
            問卷名稱
        </div>
        <input type="text" name="name" id="name" >
    </div>
    <br>
    <div class="clo moreDiv">
        <div>選項<input type="text" name="opts[]" class="opts"><button type="button" onclick="more()">更多</button></div>
    </div>
    <div>
    <button type="submit">新增</button>|
    <button type="reset">清空</button>
    </div>

    </form>
</fieldset>

<fieldset class="p-20">
    <legend>問卷列表</legend>

    <table class="w-90 ct aut">
        <tr class="clo">
            <td>問卷名稱</td>
            <td style="width: 8%;">投票數</td>
            <td style="width: 8%;">開放</td>
        </tr>
        <?php
        $rows = $Que->all();
        foreach ($rows as $key => $row) {
        ?>
        <tr>
            <td>
                <?=$row['text']?>
            </td>
            <td>
                <?=$row['sum']?>
            </td>
            <td>
                <?php
                if($row['sh'] == 0){
                ?>
                <button type="button" onclick="sh(1,<?=$row['id']?>,this)">
                    隱藏
                </button>
                <?php
                }else{
                ?>
                <button type="button" onclick="sh(0,<?=$row['id']?>,this)">
                    開放
                </button>
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


<script>
    function more(){
        $('.moreDiv').prepend(`<div>選項<input type="text" name="opts[]" class="opts"></div>`)
    }

    function sh(sh,id,e){

        $.post('./api/sh.php',{sh,id},()=>{
            console.log($(e));
            if(sh == 0){
                $(e).parent().html(`<button type="button" onclick="sh(1,${id},this)">
                    隱藏
                </button>`) 
            }else{
                $(e).parent().html(`<button type="button" onclick="sh(0,${id},this)">
                開放
                </button>`) 
            }
        })
    }
</script>