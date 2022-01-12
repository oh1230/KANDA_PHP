<?php
/* プログラム名		：menu.php
 * プログラム説明	：書籍販売システムのメニュー表示を行う
 * 作成日時			：2010/04/21
 * 作成者			：神田ITスクール
*/
//セッション利用
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>Menu</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="BLUE" width="950">
		<table width="950">
			<tr>
				<td width="33%">&nbsp;</td>
				<td width="33%" align="center"><font size="5">MENU</font></td>
				<td width="34%" >
					<table align="right" >
						<tr>
							<td>名前：</td>
							<td><?=$_SESSION['userInfo']['user']?></td>
						</tr>
						<tr>
							<td>権限：</td>
							<td><?=($_SESSION['userInfo']['authority']==1?"一般ユーザー":"管理者")?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">

		<table align="center" border="0">
			<tr><td><a href="./list.php">【書籍一覧】</a></td></tr>
			<tr><td><a href="./insert.php">【書籍登録】</a></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><a href="./showCart.php">【カート状況確認】</a></td></tr>
			<tr><td><a href="./insertIniData.php">【初期データ登録（データがない場合のみ）】</a></td></tr>
			<tr><td><a href="./orderStatus.php">【購入状況確認】</a></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><a href="./logout.php">【ログアウト】</a></td></tr>
		</table>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950">
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>