<fieldset>
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


<script>
    function more(){
        $('.moreDiv').prepend(`<div>選項<input type="text" name="opts[]" class="opts"></div>`)
    }


</script>