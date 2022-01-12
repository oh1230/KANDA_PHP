<?php
/* プログラム名		：delete.php
 * プログラム説明	：書籍を削除する
 * 作成日時			：2021/12/20
 * 作成者			：オ サン ミン
 */
    //GET送信で受け取った値を変数isbnに格納
    $isbn = $_GET['isbn'];

    //データベースに接続するphpファイルを利用
    require_once("dbprocess.php");

    //sql文の設定
    $sql = "SELECT * FROM bookinfo WHERE isbn = '{$isbn}'";

    //SQL文を実行、結果をresult変数に格納
    $result = executeQuery($sql);

    //削除対象の書籍データが無い場合
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        $errMsg = "削除対象の書籍データが無いです。";
        header("Location:error.php?errMsg={$errMsg}");
        exit;
    }

    //データベースの一行を配列の形でreturnして変数rowに格納
    $row = mysqli_fetch_array($result);

    //連想配列rowの値を変数titleとpriceに格納
    $title = $row['title'];
    $price = $row['price'];

    //データを削除するSQL文
    $sql = "DELETE FROM bookinfo WHERE isbn = '{$isbn}'";

    //SQL文を実行、結果をresult変数に格納
    $result = executeQuery($sql);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DELETE</title>
	</head>
    <body>
    	<!-- header -->
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.1.0</h1>
		<hr align="center" size="5" color="BLUE" width="950"></hr>
		<table align="center" style="width: 950">
			<tr>
				<td style="text-align: center; width: 30%">[<a href="./menu.php">メニュー</a>] [<a href="./list.php">書籍一覧</a>]</td>
				<td style="font-size: x-large; text-align: center; width: 40%">書籍削除</td>
				<td style="width: 30%"></td>
			</tr>
		</table>
		<hr align="center" size="2" color="black" width="950"></hr>
		<br>

		<!-- 削除するデータの情報を表示 -->
		<table align="center" border="1">
			<tr>
				<td style="text-align: center; width: 100; background-color: blue; color: white">ISBN</td>
				<td style="text-align: center; width: 150"><?=$isbn?></td>
			</tr>
			<tr>
				<td style="text-align: center; width: 100; background-color: blue; color: white">TITLE</td>
				<td style="text-align: center; width: 150"><?=$title?></td>
			</tr>
			<tr>
				<td style="text-align: center; width: 100; background-color: blue; color: white">価格</td>
				<td style="text-align: center; width: 150"><?=$price?>円</td>
			</tr>
		</table>

		<div style="text-align: center">
		<p>上記データを削除しました。</p>

		<a href="list.php">書籍一覧へ戻る</a>
		</div>

		<!-- footer -->
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950">
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
    </body>
</html>