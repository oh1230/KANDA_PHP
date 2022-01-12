<?php
/* プログラム名		：update.php
 * プログラム説明	：書籍情報を更新する
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

    $errMsg = "";

    //変数の宣言、GET送信で受け取ったデータを代入
    $isbn = $_GET['isbn'];
    $updateTitle = $_GET['title'];
    $updatePrice = $_GET['price'];

    //データベースに接続を担当するphpファイル
    require_once("dbprocess.php");

    //SQL文の実行
    $sql = "SELECT * FROM bookinfo WHERE isbn = '{$isbn}'";
    $result = executeQuery($sql);

    //更新対象の書籍データが無い場合
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        $link = "list.php";
        $errMsg = "更新対象の書籍は存在しない為、更新処理は行えませんでした。 ";
    }


    //結果のデータを1行ずつ読み取る
    $row = mysqli_fetch_array($result);

    $title = $row['title'];
    $price = $row['price'];

    //GET送信で受けたデータが有る場合
    if (isset($updateTitle) && isset($updatePrice)) {
        if ($updateTitle == "") {
            $link = "list.php";
            $errMsg = "TITLEが未入力の為、登録処理は行えませんでした。";
        }
        elseif ($updatePrice == "") {
            $link = "list.php";
            $errMsg = "価格が未入力の為、登録処理は行えませんでした。";
        }
        else {
            if (is_numeric($updatePrice)) {
                //SQL文の実行
                $updateSql = "UPDATE bookinfo SET title='{$updateTitle}', price='{$updatePrice}' WHERE isbn = '{$isbn}'";
                $updateResult = executeQuery($updateSql);
            }
            else {
                $link = "list.php";
                $errMsg = "価格の値が不正の為、書籍更新処理は行えませんでした。";
            }
        }
    }

    //errMsgに何が文字列が入力された場合
    if ($errMsg != "") {
        //error.phpに引数errMsgを持って飛ばす
        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>UPDATE</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="insert.php">書籍登録</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>書籍変更</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br>

		<?php
		//GET送信で受けたデータが有る場合
		if (isset($updateTitle) && isset($updatePrice)) {
		?>
			<table align="center" style="text-align: center; width: 550">
    			<tr>
    				<th style="width: 150; background-color: orange"></th>
    				<th style="width: 200; background-color: orange">&#60;&#60;変更前情報&#62;&#62;</th>
    				<th style="width: 200; background-color: orange">&#60;&#60;変更後情報&#62;&#62;</th>
    			</tr>
    			<tr>
        			<td style="background-color: orange">ISBN</td>
        			<td style="background-color: silver"><?=$isbn?></td>
        			<td style="background-color: silver"><?=$isbn?></td>
        		</tr>
    			<tr>
    				<td style="background-color: orange">TITLE</td>
    				<td style="background-color: silver"><?=$title?></td>
    				<td style="background-color: silver"><?=$updateTitle?></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">価格</td>
    				<td style="background-color: silver"><?=$price?>円</td>
    				<td style="background-color: silver"><?=$updatePrice?>円</td>
    			</tr>
    		</table>
    		<p style="text-align: center">
        		上記内容でデータを更新しました。<br>
        		<a href="list.php">書籍一覧へ戻る</a>
    		</p>

		<?php
		//GET送信で受けたデータが無い場合
		} else {
		?>
    		<form action="update.php" method="GET" style="text-align: center">
        		<table align="center" style="text-align: center; width: 550">
        			<tr>
        				<th style="width: 150; background-color: orange"></th>
        				<th style="width: 200; background-color: orange">&#60;&#60;変更前情報&#62;&#62;</th>
        				<th style="width: 200; background-color: orange">&#60;&#60;変更後情報&#62;&#62;</th>
        			</tr>
        			<tr>
        				<td style="background-color: orange">ISBN</td>
        				<td style="background-color: silver"><?=$isbn?></td>
        				<td style="background-color: silver"><?=$isbn?></td>
        			</tr>
        			<tr>
        				<td style="background-color: orange">TITLE</td>
        				<td style="background-color: silver"><?=$title?></td>
        				<td style="background-color: silver"><input style="border: 0; width: 200; background-color: silver" type="text" name="title"></td>
        			</tr>
        			<tr>
        				<td style="background-color: orange">価格</td>
        				<td style="background-color: silver"><?=$price?>円</td>
        				<td style="background-color: silver"><input style="border: 0; width: 200; background-color: silver" type="text" name="price"></td>
        			</tr>
        		</table>
        		<br>
        		<input type="hidden" name="isbn" value="<?=$isbn?>">
    			<input type="submit" value="変更完了">
    		</form>
		<?php
		}
		//結果保持用メモリを開放する
		mysqli_free_result($result);
		?>

		<br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950">
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>