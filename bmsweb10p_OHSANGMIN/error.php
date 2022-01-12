<?php
/* プログラム名		：error.php
 * プログラム説明	：エラー画面を表示
 * 作成日時			：2021/12/20
 * 作成者			：オ サン ミン
 */
    //GET送信で受け取った値を変数errMsgに格納
    $errMsg = $_GET['errMsg'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>ERROR</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.1.0</h1>
		<hr align="center" size="5" color="BLUE" width="950"></hr>


		<p style="text-align: center">
		●●エラー●●<br>
		<?=$errMsg?>
		<br><br>
		[<a href="list.php">一覧表示に戻る</a>]
		</p>


		<br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
    </body>
</html>