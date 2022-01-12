<?php
/* プログラム名		：update.php
 * プログラム説明	：書籍情報の更新処理を行う
 * 作成日時		：2010/04/21
 * 作成者		：神田ITスクール
*/
	//セッション利用
	session_start();
	
	//データベースプロセスファイルを読み込む
	require_once("dbprocess.php");

	$errMsg = "";

	//入力データの取得
	if(isset($_POST["isbn"])){
		$isbn = $_POST["isbn"];
	}else{
		$isbn = $_GET["isbn"];
	}

	//更新対象の書籍情報があるか検索する
	$sql = "SELECT * FROM bookinfo WHERE isbn ='{$isbn}'";
	$result = executeQuery($sql);

	if(mysqli_num_rows($result) == 0){
		$errMsg = "更新対象の書籍は存在しない為、更新処理は行なえませんでした。";

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
	}

	$updateExec = "";
	//変更ボタンを押して呼び出された場合の処理
	if (isset($_POST["updateExec"])) {
		$updateExec = $_POST["updateExec"];

		//入力フォームの情報を取得
		$newTitle = $_POST["title"];
		$newPrice = $_POST["price"];

		//入力値チェック
		if($newTitle == ""){
			//タイトル入力なしの場合
			$errMsg = "タイトルが未入力の為、書籍更新処理は行えませんでした。";
		}else{
			if($newPrice == ""){
				//価格入力なしの場合
				$errMsg = "価格が未入力の為、書籍更新処理は行えませんでした。";
			}else if(!is_numeric($newPrice)){
				//価格が整数でない場合
				$errMsg = "価格の値が不正の為、書籍更新処理は行えませんでした。";
			}
		}

		//エラーメッセージの有無で処理判断
		if($errMsg == ""){
			//更新対象の書籍情報が存在したので更新処理を行う
			$sql = "UPDATE bookinfo SET title ='{$newTitle}',price={$newPrice} WHERE isbn ='{$isbn}'";
			$result = executeQuery($sql);
		}else{
			//入力値に不正があるのでエラーページへ遷移する
			header("Location: ./error.php?errMsg={$errMsg}");
			exit;
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<base target="_self" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>Update</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table width="950px" align="center">
			<tr>
				<td width="33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./insert.php">書籍登録</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td width="33%" align="center"><font size="5">書籍変更</font></td>
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
		<br></br>
		<form name = "form_update" action="./update.php" method="post">
			<table align="center" width="550" border="2">
				<tr>
					<td align="center" width="150" bgcolor="#6666ff"></td>
					<th align="center" width="200" bgcolor="#6666ff">&lt;&lt;変更前情報&gt;&gt;</th>
					<th align="center" width="200" bgcolor="#6666ff">&lt;&lt;変更後情報&gt;&gt;</th>
				</tr>
				<tr>
					<th align="center" width="150" bgcolor="#6666ff">ISBN</th>
					<td align="center" width="200" bgcolor="#e6e6fa">　<?=$isbn?></td>
					<td align="center" width="200" >&nbsp;<?=$isbn?></td>
				</tr>
				<tr>
					<th align="center" width="150" bgcolor="#6666ff">TITLE</th>
					<td align="center" width="200" bgcolor="#e6e6fa">　<?=$title?></td>
<?php			if($updateExec==""){
?>					<td align="center" width="200" ><input type=text size="20" name="title" value="<?=$title?>"></input></td>
<?php			}else{
?>					<td align="center" width="200" >&nbsp;<?=$newTitle?></td>
<?php			}
?>				</tr>
				<tr>
					<th align="center" width="150" bgcolor="#6666ff">価格</th>
					<td align="center" width="200" bgcolor="#e6e6fa">　<?=$price?>円</td>
<?php			if($updateExec==""){
?>					<td align="center" width="200" ><input type=text size="20" name="price" value="<?=$price?>"></input></td>
<?php			}else{
?>					<td align="center" width="200" >&nbsp;<?=$newPrice?></td>
<?php			}
?>				</tr>
			</table>
<?php		if($updateExec==""){
?>				<p align="center"><input type="submit" name="updateExec" value="&nbsp;変更完了&nbsp;"/></p>
<?php		}else{
?>				<p align="center"><font size="4">上記内容でデータを更新しました。</font></p>
				<p align="center"><a href="./list.php">書籍一覧へ戻る</a></p>
<?php		}
?>			<input type="hidden" name="isbn" value="<?=$isbn?>"></input>
		</form>
		<br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>