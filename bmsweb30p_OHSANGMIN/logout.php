<?php
    /* プログラム名		：logout.php
     * プログラム説明	：ログオウト画面
     * 作成日時			：2022/01/07
     * 作成者			：オ サン ミン
     */
    session_start();
    //セッションデータ削除
    session_destroy();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>LOGOUT</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%"></td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>ログアウト画面</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%"></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br>

		<div style="text-align: center">
			<h2>ログアウトしました。</h2>
			<a href="login.php">[ログイン画面へ戻る]</a>
		</div>

		<br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>