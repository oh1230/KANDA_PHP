<?php
/* プログラム名		：insert.php
 * プログラム説明	：書籍情報の新規登録処理を行う
 * 作成日時			：2010/04/21
 * 作成者			：神田ITスクール
*/
	//セッション利用
	session_start();
	
	//データベースプロセスファイルを読み込む
	require_once("dbprocess.php");

	//エラーメッセージ格納用変数
	$errMsg = "";
	
	$insertExec="";
	if(isset($_POST["insertExec"])) {
		
		$insertExec = $_POST["insertExec"];

		//入力値を取得
		$isbn  = $_POST["isbn"];
		$title = $_POST["title"];
		$price = $_POST["price"];

		//入力値をチェックする
		if($isbn ==""){
			//ISBNの入力なしの場合
			$errMsg = "ISBNが未入力の為、書籍登録処理は行えませんでした。";
		}else if($title == ""){
			//タイトル入力なしの場合
			$errMsg = "タイトルが未入力の為、書籍登録処理は行えませんでした。";
		}else if($price == ""){
			//価格入力なしの場合
			$errMsg = "価格が未入力の為、書籍登録処理は行えませんでした。";
		}else if(!is_numeric($price)){
			//価格が整数でない場合
			$errMsg = "価格の値が不正の為、書籍登録処理は行えませんでした。";
		}else {
			//入力ISBNが既に使用されていないかチェックを行う
			$sql = "SELECT * FROM bookinfo WHERE isbn='{$isbn}'";
			$result = executeQuery($sql);

			if(mysqli_num_rows($result) != 0){
				$errMsg = "入力ISBNは既に登録済みの為、書籍登録処理は行えませんでした。";
			}
			//リソースの開放
			mysqli_free_result($result);

		}
		

		//エラーメッセージの有無で処理判断
		if($errMsg == ""){
			//入力値が問題ないので登録処理を行う
			$sql = "INSERT INTO bookinfo VALUES('{$isbn}','{$title}',{$price})";
			$result = executeQuery($sql);

		}else{
			//入力値に不正があるのでエラーページへ遷移する
			header("Location: ./error.php?errMsg={$errMsg}");
			exit;
		}
	}
?>
<html>
	<head>
		<base target="_self" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>Insert</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="BLUE" width="950"></hr>
		<table width="950px" align="center">
			<tr>
				<td width="33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td width="33%" align="center"><font size="5">書籍登録</font></td>
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

		<form name="insert_form" method="post">
			<table align="center" border="2">
<?php		if($insertExec == ""){
?>				<tr>
					<td align="center" bgcolor="#6666FF" width="100">ISBN</td>
						<TD><INPUT type=text size="20" name="isbn"></input></td>
				</tr>
				<tr>
					<td align="center" bgcolor="#6666ff">TITLE</td>
					<td><input type=text size="20" name="title"></input></td>
				</tr>
				<tr>
					<td align="center" bgcolor="#6666ff">価格</td>
					<td><input type=text size="20" name="price"></input></td>
<?php		}else{
?>				<tr>
					<td align="center" bgcolor="#6666ff" width="100">ISBN</td>
					<td align="center" width="100"><?= $isbn ?></td>
				</tr>
				<tr>
					<td align="center" bgcolor="#6666ff">TITLE</td>
					<td align="center" width="100"><?= $title ?></td>
				</tr>
				<tr>
					<td align="center" bgcolor="#6666ff">価格</td>
					<td align="center" width="100"><?= $price ?>円</td>
				</tr>
<?php		}
?>			</TABLE>
			<center>
<?php		if($insertExec == ""){
?>				<br/>
				<INPUT TYPE="submit"  name="insertExec" VALUE="&nbsp;登録&nbsp;" ></INPUT>
<?php		}else{
?>				<p><font size="4">上記データを登録しました。</font></p>
				<a href="./list.php">書籍一覧へ戻る</a>&nbsp;&nbsp;&nbsp;<a href="./insert.php">続けて登録する</a>
<?php		}
?>			</center>
		</form>
		<br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>