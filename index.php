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
	
<style>
body{background:#00441F;color:#fff;font-family: YuGothic, '游ゴシック', 'Hiragino Kaku Gothic Pro', 'ヒラギノ角ゴ Pro W3', Osaka, 'メイリオ', Meiryo, 'ＭＳ Ｐゴシック', Tahoma, Verdana, Arial, Verdana, sans-serif;
	font-size:0.9em;line-height:1.1em;padding:10px;box-sizing: border-box;}	
a{color:#ffffcc;text-decoration:none;font-weight: normal;}
#wrap{width:100%;border:none;margin:0;}
.thumbnail{height:inherit;}
@media only screen and (min-width: 334px) {
	body{background:#00441F;color:#fff;font-family: YuGothic, '游ゴシック', 'Hiragino Kaku Gothic Pro', 'ヒラギノ角ゴ Pro W3', Osaka, 'メイリオ', Meiryo, 'ＭＳ Ｐゴシック', Tahoma, Verdana, Arial, Verdana, sans-serif;
		font-size:12px;line-height:16px;padding:10px;box-sizing: border-box;
	}
}
@media only screen and (min-width: 768px) {
	#wrap{width:1000px;border:solid 1px #ccc;margin:10px auto;}
	.thumbnail{height:150px;}
}
</style>

<script src="//code.jquery.com/jquery-1.12.1.min.js"></script>

<!-- BootStrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- // BootStrap -->

<script type="text/javascript">
    /* https://www.sejuku.net/blog/42985#post-3 */
    $(function(){
        $('form').submit(function(event){
            event.preventDefault();
            //console.log('submit');
            //console.log(event);
            //var form = $(this);
            //console.log(form)
            //console.log($(this));
            //console.log($(this).attr('action'));
            //console.log($(this).serializeArray());
            $.post({
                url: $(this).attr('action'),
                data: $(this).serialize(),
                /*dataType: 'json',*/
            }).done(function(data){
                //console.log(data);
            }).fail(function(a,b,c){
                /* console.log('error');
                console.log(a);
                console.log(b);
                console.log(c); */
            }).always(function(){
                // console.log('always');
            })
        });
    })
    /* 複数ボタンはこちら（https://qiita.com/icbmuma/items/92f3467a54a071280595） */
</script>
</head>
<body>
<form action="master-number.php" method="post">
<p>
名前：<input type="text" name="name" size="40">
</p>
<input type="submit" value="送信">
</body>