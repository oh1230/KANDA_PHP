<?php
/* プログラム名		：error.php
 * プログラム説明	：書籍管理システムで起こったエラーの表示を行う
 * 作成日時			：2010/04/21
 * 作成者			：神田ITスクール
*/
$path=$_GET['path'];
switch($path){
	case "menu":
		$pathName="メニューに戻る";
		break;
	case "logout":
		$pathName="ログアウトする";
		break;
	default: 
		$path="list";
		$pathName="一覧表示に戻る";
		break;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>Error</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="850">
			<tr>
				<td align="center">●●エラー●●</td>
			</tr>
			<tr>
				<td align="center"><?=$_GET["errMsg"] ?></td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td align="center">[<a href="./<?=$path?>.php"><?=$pathName?></a>]</td>
			</tr>
		</table>
		<br><br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>