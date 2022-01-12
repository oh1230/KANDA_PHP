<?php
    /* プログラム名		：insertIntoCart.php
     * プログラム説明	：カートに書籍を入れる
     * 作成日時			：2022/01/07
     * 作成者			：オ サン ミン
     */
    //セッションでIDと権限を確認
    session_start();
    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    if (!isset($id) || !isset($author)) {
        $errMsg = "セッション切れの為、カートに追加処理は行えませんでした。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

    $errMsg = "";

    //GET送信で受け取った値を変数isbnに格納
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];

    //データベースに接続するphpファイルを利用
    require_once("dbprocess.php");

    //sql文の設定、ISBNが一致する他のデータも取得
    $sql = "SELECT * FROM bookinfo WHERE isbn = '{$isbn}'";

    //SQL文を実行、結果をresult変数に格納
    $result = executeQuery($sql);

    //詳細表示対象の書籍データが無い場合
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        $link = "menu.php";
        $errMsg = "該当書籍がDBに存在しない為、カートに追加処理は行えませんでした。 ";
    }
    else {
        //データベースの一行を配列の形でreturnして変数rowに格納
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $price = $row['price'];

        $row['quantity'] = $quantity;

        $_SESSION['cartInfo'][] = $row;

        mysqli_free_result($result);
    }

    if ($errMsg != "") {
        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>INSERT INTO CART</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./insert.php">書籍一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>カート追加</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br>

		<div align="center">
			<h2>下記の書籍をカートに追加しました。</h2>
			<table style="width: 300; text-align: center">
				<tr>
					<th style="width: 150; background-color: orange">ISBN</th>
					<td style="width: 150; background-color: silver"><?=$isbn?></td>
				</tr>
				<tr>
					<th style="background-color: orange">TITLE</th>
					<td style="background-color: silver"><?=$title?></td>
				</tr>
				<tr>
					<th style="background-color: orange">価格</th>
					<td style="background-color: silver"><?=$price?></td>
				</tr>
				<tr>
					<th style="background-color: orange">購入数</th>
					<td style="background-color: silver"><?=$quantity?>冊</td>
				</tr>
			</table><br>
			<form action="showCart.php" method="POST">
				<input type="submit" value="カート確認">
			</form>
		</div>

		<br><br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>