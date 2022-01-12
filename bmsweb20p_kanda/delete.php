<?php
/* プログラム名		：delete.php
 * プログラム説明	：書籍情報の削除処理を行う
 * 作成日時		：2010/04/21
 * 作成者		：神田ITスクール
*/
	//セッション利用
	session_start();
	
	//データベースプロセスファイルを読み込む
	require_once("dbprocess.php");

	//入力パラメータのISBNを取得(POSTとGET両方から)
	if(isset($_POST["isbn"])){
		$isbn = $_POST["isbn"];
	}else{
		$isbn = $_GET["isbn"];
	}

	//削除対象の書籍情報があるか検索する
	$sql = "SELECT * FROM bookinfo WHERE isbn ='{$isbn}'";
	$result = executeQuery($sql);

	if(mysqli_num_rows($result) == 0){
		$errMsg = "削除対象の書籍は存在しない為、削除処理は行なえませんでした。";

		//書籍情報が取得出来ないのでエラーページへ遷移する
		header("Location: ./error.php?errMsg={$errMsg}");
		exit;
	}else{
		//検索結果から書籍の情報(タイトルと価格)を取得
		$row = mysqli_fetch_array($result);
		$title = $row['title'];
		$price = $row['price'];

		//検索結果のリソースの開放
		mysqli_free_result($result);

		//削除対象の書籍情報が存在したので削除処理を行う
		$sql = "DELETE FROM bookinfo WHERE isbn = '{$isbn}'";
		$result = executeQuery($sql);
	}

?>
<html>
	<head>
		<base target="_self" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"" />
		<meta http-equiv="content-style-type" content="text/css" />
		<title>Delete</title>
		<script language="javascript" src="../js/insert.js" ></script>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table width="950px" align="center">
			<tr>
				<td width="33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td width="33%" align="center"><font size="5">書籍削除</font></td>
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

		<table align="center" border="2">
			<tr>
				<td align="center" bgcolor="#6666FF" width="100">ISBN</td>
				<td align="center" width="100"><?=$isbn?></td>
			</tr>
			<tr>
				<td align="center" bgcolor="#6666ff">TITLE</td>
				<td align="center" width="100"><?=$title?></td>
			</tr>
			<tr>
				<td align="center" bgcolor="#6666ff">価格</td>
				<td align="center" width="100"><?=$row[price]?>円</td>
			</tr>
		</table>
		<p align="center"><font size="4">上記データを削除しました。</font></p>
		<p align="center"><a href="./list.php">書籍一覧へ戻る</a></p>
		<br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>