<?php
/* プログラム名		：orderStatus.php
 * プログラム説明	：購入情報をDBより取得し画面に表示する。
 * 作成日時		：2010/04/21
 * 作成者		：神田ITスクール
*/
	//セッション利用
	session_start();

	//データベースプロセスファイルを読み込む
	require_once("dbprocess.php");
	
	//全検索SQL文の設定
	$sql = "SELECT o.user,b.title,o.date FROM orderinfo o inner join bookinfo b on o.isbn=b.isbn";

	//dbprocessファイルから「executeQuery」関数を利用してSQLを発行する
	$result = executeQuery($sql);

	//結果セットの行数を取得する
	$rows = mysqli_num_rows($result);
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>OrderStatus</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="BLUE" width="950"></hr>
		<table width="950px" align="center">
			<tr>
				<td width="33%">[<a href="./menu.php">メニュー</a>]</td>
				<td width="33%" align="center"><font size="5">購入状況</font></td>
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
		<hr align="center" size="2" color="black" width="950"></hr>
		<br/><br/>
		<table align="center" border="0">
			<tr>
				<th bgcolor="#6666FF" width="200">ユーザー</th>
				<th bgcolor="#6666FF" width="200">TITLE</th>
				<th bgcolor="#6666FF" width="200">価格</th>
			</tr>
			<?php
			while($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td align="center"><?=$row['user']?></td>
				<td align="left">　<?=$row['title']?></td>
				<td align="center"><?=$row['date']?></td>
			</tr>
			<?php 		
				}
				mysqli_free_result($result);
			?>
		</TABLE>
		<br>
		<br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>