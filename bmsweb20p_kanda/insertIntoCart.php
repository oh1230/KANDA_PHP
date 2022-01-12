<?php
/* プログラム名		：insertIntoCart.php
 * プログラム説明	：該当書籍をセッションのカートに追加する
 * 作成日時		：2010/04/21
 * 作成者		：神田ITスクール
*/
	//セッション利用
	session_start();
	
	//データベースプロセスファイルを読み込む
	require_once("dbprocess.php");

	if(!isset($_SESSION['userInfo'])){
		$errMsg = "セッション切れの為、カートに追加処理は行えませんでした。";
		header("Location: ./error.php?errMsg={$errMsg}&path=logout");
		exit;
	}else{
	 	//データを取得する
		$isbn = $_GET["isbn"];
		
		// クエリを送信する
		$sql = "SELECT * FROM bookinfo WHERE isbn = '{$isbn}'";
		$result = executeQuery($sql);
		
		if(mysqli_num_rows($result) == 0){
			//書籍情報が取得出来ないのでエラーページへ遷移する
			$errMsg = "詳細対象の書籍が存在しない為、カートに追加処理は行えません。";
			header("Location: ./error.php?errMsg={$errMsg}&path=list");
			exit;
		}else{
			//検索結果から書籍の情報(タイトルと価格)を取得
			$row = mysqli_fetch_assoc($result);
	
			//セッションに書籍情報の追加
			$_SESSION['cartInfo'][]=$row;
			
			//検索結果のリソースの開放
			mysqli_free_result($result);
			
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<base target="_self" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>InsertIntoCart</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table width="950px" align="center">
			<tr>
				<td width="33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td width="33%" align="center"><font size="5">カート追加</font></td>
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
		<h2 align="center">下記の書籍をカートに追加しました。</h2>
		<table align="center" width="350"  border="2">
			<tr>
				<th align="center" width="175" bgcolor="#6666ff">ISBN</th>
				<td align="center" width="175" bgcolor="#e6e6fa"><?=$row['isbn']?></td>
			</tr>
			<tr>
				<th align="center" width="175" bgcolor="#6666ff">TITLE</th>
				<td align="center" width="175" bgcolor="#e6e6fa"><?=$row['title']?></td>
			</tr>
			<tr>
				<th align="center" width="175" bgcolor="#6666ff">価格</th>
				<td align="center" width="175" bgcolor="#e6e6fa"><?=$row['price']?>円</td>
			</tr>
		</table>
		<br><br>
		<center>
		<form action="./showCart.php">
			<input type="submit" value="カート確認">
		</form>
		</center>
		<br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>