<?php
    // Show PHP errors (during development only)
    error_reporting(E_ALL | E_STRICT);
    ini_set("display_errors", 2);
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="ROBOTS" content="NOINDEX,NOFOLLOW">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>blog</title>

<link href="./css/style1.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script type="text/javascript">
    $(function(){
        $('form').submit(function(event){
            event.preventDefault();
            $.post({
                url: $(this).attr('action'),
                data: $(this).serialize(),
            }).done(function(data){
                console.log(data);
                outputHtml = '<div class="alert alert-success">あなたのマスターナンバーは ' + data + ' です</div>';
                $('#form-result').html(outputHtml);
            }).fail(function(a,b,c){
                //
            }).always(function(){
                //
            })
        });
    })
    /* 複数ボタンはこちら（https://qiita.com/icbmuma/items/92f3467a54a071280595） */
</script>

</head>
<body>
<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container">
	<div class="page-lock">
        <div class="page-logo">
    		<a class="brand" href="index.html">
    		<img src="./img/masternumberLogo2_60x60.png" alt="logo"/>
    		</a>
    	</div>
    	<div class="page-body">
    		<div class="lock-head">
    			 マスターナンバー
    		</div>
    		<div class="lock-body">
    			<div class="pull-left lock-avatar-block">
    				<!--<img src="./img/masternumberLogo.png" class="lock-avatar">-->
    			</div>
    			<form class="lock-form pull-left" action="master-number.php" method="post">
    				<h4>下記にあなたのお名前をローマ字で入力してください。</h4>
                    <p class="text-muted">（例：山田太郎 → YAMADA TAROU）</p>
    				<div class="form-group">
    					<!--<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>-->
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="YAMADA TAROU" name="name" required/>
    				</div>
    				<div class="form-actions">
    					<button type="submit" class="btn btn-success uppercase">判定する！</button>
    				</div>
                    <hr class="" />
                    <div id="form-result">
                    </div>
    			</form>
    		</div>
    		<div class="lock-bottom">
    			<a href="">詳しくはこちら</a>
    		</div>
    	</div>
    </div>
</div>

<br>
<br>
<center>
<strong>Designed by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
</center>
<br>
<br>
</body>
</html>