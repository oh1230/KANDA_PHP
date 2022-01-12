<?php
/* プログラム名		：list.php
 * プログラム説明	：DBの書籍情報の全てを取得して表示を行う
 * 作成日時			：2021/12/23
 * 作成者			：オ サン ミン
*/
    //セッションでIDと権限を確認
    session_start();
    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    $acess = time();

    if (!isset($id) || !isset($author)) {
        $errMsg = "権限がありません。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

    if (!isset($id) || !isset($author)) {
        $errMsg = "権限がありません。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

	//データベースプロセスファイルを読み込む
	require_once("dbprocess.php");

	//全検索SQL文の設定
	$sql = "SELECT * FROM bookinfo ORDER BY isbn";

	//dbprocessファイルから「executeQuery」関数を利用してSQLを発行する
	$result = executeQuery($sql);

	//結果セットの行数を取得する
	$rows = mysqli_num_rows($result);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>List</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./insert.php">書籍登録</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>書籍一覧</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br>

		<!-- 検索機能 -->
		<table align="center">
			<tr>
				<td>
					<form action="./search.php" method="post">
						ISBN:<input type="text" name="isbn" value="" style="width: 150"/>　
						TITLE:<input type="text" name="title" value="" style="width: 150"/>　
						価格:<input type="text" name="price" value="" style="width: 150"/>　
						<input type="submit" value="検索" />
					</form>
				</td>
				<td>
					<form action="./list.php"><input type="submit" value="全件表示" /></form>
				</td>
			</tr>
		</table>
		<br>

		<!-- 書籍一覧の表示 -->
		<table align="center" style="border: 0; width: 950">
			<tr >
				<th bgcolor="orange" width="200">ISBN</th>
				<th bgcolor="orange" width="200">TITLE</th>
				<th bgcolor="orange" width="200">価格</th>
				<th bgcolor="orange" width="350">更新/削除/カートに入れる</th>
			</tr>
			<?php
			//検索結果を表示
			if($rows){
				while($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td align="center"><a href="detail.php?isbn=<?=$row["isbn"]?>" target="_self"><?=$row["isbn"]?></a></td>
				<td align="center"><?=$row["title"]?></td>
				<td align="center"><?=$row["price"]?>円</td>
				<td align="center">
					<a href="update.php?isbn=<?=$row["isbn"]?>" target="_self">更新</a>　
					<a href="delete.php?isbn=<?=$row["isbn"]?>" target="_self">削除</a>　
					<a href="insertIntoCart.php?isbn=<?=$row["isbn"]?>&acess=<?=$acess?>">カートに入れる</a>
				</td>
			</tr>
			<?php
				}
			}else{
			?>
			<tr>
				<td colspan="4" align="center">
					書籍データは1件もありません。
				</td>
			</tr>
			<?php
			}
			//結果保持用メモリを開放する
			mysqli_free_result($result);
			?>
		</table>

		<br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
	</body>
</html>