<?php
/* プログラム名		：error.php
 * プログラム説明	：エラー画面を表示
 * 作成日時			：2021/12/23
 * 作成者			：オ サン ミン
 */
    //GET送信で受け取った値を変数errMsgに格納
    $errMsg = $_GET['errMsg'];
    $link = $_GET['link'];

    //送られてきた変数linkの値しだい行先が変わる
    if ($link == "list.php") {
        $msg = "一覧表示へ戻る";
    }
    elseif ($link == "menu.php") {
        $msg = "メニューへ戻る";
    }
    else {
        $link = "logout.php";
        $msg = "ログアウトする";
    }

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>ERROR</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="orange" width="950">
		<br>
		<p style="text-align: center">
    		●●エラー●●<br>
    		<?=$errMsg?>
    		<br><br>
    		[<a href="<?=$link?>"><?=$msg?></a>]
		</p>


		<br><br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>