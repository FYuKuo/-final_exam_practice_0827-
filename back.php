﻿<?php
$do = ($_GET['do'])??'main';
include('./api/base.php');
if(!isset($_SESSION['user']) || $_SESSION['user'] != 'admin'){
	to('./index.php');
	exit();
}

$view = $View->find(['date'=>date('Y-m-d')]);
if(!isset($_SESSION['view'])){
	if(empty($view)){
		$View->save(['date'=>date('Y-m-d'),'total'=>1]);
	}else{
		$view['total']++;
		$View->save($view);
	}
$_SESSION['view'] = 1;
}
$viewSum = 0;
foreach ($View->all() as $key => $value) {
	$viewSum += $value['total'];
}
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>健康促進網</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="alerr"style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
        <pre id="ssaa"></pre>
    </div>

    <div id="all">
        <div id="title">
            <?=date('m')?> 月 <?=date('d')?> 號 <?=date('l')?> | 今日瀏覽: <?=$view['total']?> | 累積瀏覽: <?=$viewSum?> </div>
        <div id="title2" title="回首頁">
			<a href="./index.php">
				<img src="./icon/02B01.jpg" alt="回首頁">
			</a>
        </div>
        <div id="mm">

            <div class="hal" id="lef">
                <a class="blo" href="?do=admin">帳號管理</a>
                <a class="blo" href="?do=news">最新文章</a>
                <a class="blo" href="?do=que">問卷調查</a>
            </div>

            <div class="hal" id="main">
                <div>
                    <span style="width:78%; display:inline-block;">
                        <marquee>請民眾踴躍投稿電子報，讓電子報成為大家互相交流的園地！詳見最新文章</marquee>
                    </span>
                    <span style="width:18%; display:inline-block;">
						<?php
						if(isset($_SESSION['user'])){
							if($_SESSION['user'] == 'admin'){
						?>
							歡迎，<?=$_SESSION['user']?>
							<button onclick="location.href='./back.php'">管理</button>
							<button onclick="location.href='./api/logout.php'">登出</button>
						<?php
							}else{
						?>	
							歡迎，<?=$_SESSION['user']?>
							<button onclick="location.href='./api/logout.php'">登出</button>
						<?php	
							}	
						}else{
						?>
							<a href="?do=login">會員登入</a>
						<?php	
						}
						?>
                    </span>
                    <div class="content">
						<?php
						if(file_exists('./back/'.$do.'.php')){
							include('./back/'.$do.'.php');
						}else{
							include('./back/main.php');
						}
						?>
                    </div>
                </div>
            </div>

        </div>
        <div id="bottom" class="d-f" style="justify-content: flex-end;">
			<div class="">
				本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2012健康促進網社群平台 All Right Reserved
				<br>
				服務信箱：health@test.labor.gov.tw
			</div>
			<img src="./icon/02B02.jpg" width="45">
        </div>
    </div>

</body>

</html>