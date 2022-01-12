<?php
/* プログラム名		：detail.php
 * プログラム説明	：書籍の詳細情報を表示する
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

    //GET送信で受け取った値を変数isbnに格納
    $isbn = $_GET['isbn'];

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
        $errMsg = "詳細表示対象の書籍データが無いです。";
        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

    //データベースの一行を配列の形でreturnして変数rowに格納
    $row = mysqli_fetch_array($result);

    //連想配列rowの値を変数titleとpriceに格納
    $title = $row['title'];
    $price = $row['price'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DETAIL</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="insert.php">書籍登録</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>書籍詳細情報</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br>

		<table align="center" style="border: 0; width: 300">
			<tr>
				<td style="width: 150; text-align: center">
            		<form action="update.php" method="GET">
            			<input type="hidden" name="isbn" value="<?=$isbn?>">
            			<input type="submit" value="変更">
            		</form>
        		</td>
        		<td style="width: 150; text-align: center">
            		<form action="delete.php" method="GET">
            			<input type="hidden" name="isbn" value="<?=$isbn?>">
            			<input type="submit" value="削除">
            		</form>
        		</td>
        	</tr>
		</table>
		<br>

		<table align="center" style="border: 0; width: 300; text-align: center">
			<tr>
				<td style="width: 150; background-color: orange">ISBN</td>
				<td style="width: 150; background-color: silver"><?=$isbn?></td>
			</tr>
			<tr>
				<td style="background-color: orange">TITLE</td>
				<td style="background-color: silver"><?=$title?></td>
			</tr>
			<tr>
				<td style="background-color: orange">価格</td>
				<td style="background-color: silver"><?=$price?>円</td>
			</tr>
		</table>
		<?php
			//結果保持用メモリを開放する
			mysqli_free_result($result);
		?>

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950">
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>