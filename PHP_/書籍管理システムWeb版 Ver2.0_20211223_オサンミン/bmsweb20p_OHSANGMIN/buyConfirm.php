<?php
    /* プログラム名		：buyConfirm.php
     * プログラム説明	：購入確認画面
     * 作成日時			：2021/12/23
     * 作成者			：オ サン ミン
     */
    //セッションでIDと権限を確認
    session_start();
    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    //権限が無かった場合、ログオウトさせる
    if (!isset($id) || !isset($author)) {
        $errMsg = "権限がありません。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

    //データベースプロセスファイルを読み込む
    require_once("dbprocess.php");

    //全検索SQL文の設定
    $sql = "SELECT * FROM cartinfo ORDER BY isbn";

    //dbprocessファイルから「executeQuery」関数を利用してSQLを発行する
    $result = executeQuery($sql);

    //合計計算のための変数
    $total = 0;

    //購入確定の書籍はshoppinginfo（ユーザー、TITLE、注文日）データに入る
    $sqlCart = "SELECT title FROM cartinfo";
    $resultCart = executeQuery($sqlCart);
    while($row = mysqli_fetch_array($resultCart)) {
        $user = $author;
        $title = $row['title'];
        $date = date("Y-m-d");

        $shoppingSql = "INSERT INTO shoppinginfo(user,title,date) VALUES('{$user}','{$title}','{$date}')";
        $resultShopping = executeQuery($shoppingSql);
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>BUY CONFIRM</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>購入品確認</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">

		<br>
		<table align="center" style="width: 800; text-align: left">
			<tr>
				<td>
					<h2>
            			下記の商品を購入しました。<br>
            			ご利用ありがとうございました。
            		</h2>
				</td>
			</tr>
		</table>

		<table align="center" style="border: 0; width: 800">
			<tr >
				<th bgcolor="orange" width="267">ISBN</th>
				<th bgcolor="orange" width="267">TITLE</th>
				<th bgcolor="orange" width="266">価格</th>
			</tr>
			<?php
			//検索結果を表示
			while($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td align="center"><?=$row["isbn"]?></a></td>
				<td align="center"><?=$row["title"]?></td>
				<td align="center"><?=$row["price"]?>円</td>
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

		<br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>