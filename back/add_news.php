<fieldset>
    <legend>新增文章</legend>
    <table class="w-90 aut">
        <tr>
            <td>文章管理</td>
            <td><input type="text" name="title" id="mytitle" style="width: 90%;"></td>
        </tr>
        <tr>
            <td>文章分類</td>
            <td>
                <select name="type" id="type" style="width: 20%;">
                    <option value="1">健康新知</option>
                    <option value="2">菸害防制</option>
                    <option value="3">癌症防治</option>
                    <option value="4">慢性病防治</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>文章內容</td>
            <td>
                <textarea name="text" id="text" cols="30" rows="10" style="width: 90%;"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="ct">
                <button onclick="addNews()">新增</button>
                <button onclick="resetNews()">重置</button>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function addNews(){
        let title = $('#mytitle').val();
        let type = $('#type').val();
        let text = $('#text').val();

        if(title != '' && type != '' && text != '')
        $.post('./api/add_news.php',{title,type,text},()=>{
            location.href='?do=news';
        })
    }

    function resetNews(){
        $('textarea,input[type=text]').val('');
        $('#type').find("option").first().attr("selected", true)
    }
</script>