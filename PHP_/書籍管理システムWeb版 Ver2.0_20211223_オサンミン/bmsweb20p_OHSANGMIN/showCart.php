<?php
    /* プログラム名		：showCart.php
     * プログラム説明	：カートリスト画面
     * 作成日時			：2021/12/23
     * 作成者			：オ サン ミン
     */
    //セッションでIDと権限を確認
    session_start();
    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    if (!isset($id) || !isset($author)) {
        $errMsg = "権限がありません。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

    //データベースプロセスファイルを読み込む
    require_once("dbprocess.php");

    $isbn = $_GET['isbn'];

    if (isset($isbn)) {
        $delSql = "DELETE FROM cartinfo WHERE isbn = '{$isbn}'";
        $delResult = executeQuery($delSql);
    }

    //全検索SQL文の設定
    $sql = "SELECT * FROM cartinfo ORDER BY isbn";

    //dbprocessファイルから「executeQuery」関数を利用してSQLを発行する
    $result = executeQuery($sql);

    $total = 0;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>SHOW CART</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>カート内容</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br>

		<table align="center" style="border: 0; width: 800">
			<tr >
				<th bgcolor="orange" width="200">ISBN</th>
				<th bgcolor="orange" width="200">TITLE</th>
				<th bgcolor="orange" width="200">価格</th>
				<th bgcolor="orange" width="200">削除</th>
			</tr>
			<?php
			//検索結果を表示
			while($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td align="center"><a href="detail.php?isbn=<?=$row["isbn"]?>" target="_self"><?=$row["isbn"]?></a></td>
				<td align="center"><?=$row["title"]?></td>
				<td align="center"><?=$row["price"]?>円</td>
				<td align="center">
					<a href="showCart.php?isbn=<?=$row['isbn']?>">削除</a>
				</td>
			</tr>
			<?php
			    $total += $row["price"];
			}
			//結果保持用メモリを開放する
			mysqli_free_result($result);
			?>
		</table>
		<br>
		<hr align="center" size="2" color="SILVER" width="800">
		<table align="center" style="width: 800">
			<tr>
				<td style="width: 200"></td>
				<td style="width: 200"></td>
				<td style="width: 200"></td>
				<td style="width: 200">
					<table>
						<tr>
							<th style="text-align: center; width: 100; background-color: orange">合計</th>
							<td style="text-align: center; width: 100; background-color: silver"><?=$total?>円</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table align="center" style="width: 800">
			<tr>
				<td style="width: 200"></td>
				<td style="width: 200"></td>
				<td style="width: 200"></td>
				<td style="width: 200; text-align: right"><br>
					<form action="buyConfirm.php" method="POST">
						<input type="submit" value="購入">
					</form>
				</td>
			</tr>
		</table>

		<br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>