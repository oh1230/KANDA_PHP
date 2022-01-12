<?php
/* プログラム名		：update.php
 * プログラム説明	：書籍情報を更新する
 * 作成日時			：2021/12/20
 * 作成者			：オ サン ミン
 */
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
        $errMsg = "更新対象の書籍データが無いです。";
    }


    //結果のデータを1行ずつ読み取る
    $row = mysqli_fetch_array($result);

    $title = $row['title'];
    $price = $row['price'];

    //GET送信で受けたデータが有る場合
    if (isset($updateTitle) && isset($updatePrice)) {
        if ($updateTitle == "") {
            $errMsg = "TITLEが未入力の為、登録処理は行えませんでした。";
        }
        elseif ($updatePrice == "") {
            $errMsg = "価格が未入力の為、登録処理は行えませんでした。";
        }
        else {
            if (is_numeric($updatePrice)) {
                //SQL文の実行
                $updateSql = "UPDATE bookinfo SET title='{$updateTitle}', price='{$updatePrice}' WHERE isbn = '{$isbn}'";
                $updateResult = executeQuery($updateSql);
            }
            else {
                $errMsg = "価格の値が半角数字ではありません。";
            }
        }
    }

    //errMsgに何が文字列が入力された場合
    if ($errMsg != "") {
        //error.phpに引数errMsgを持って飛ばす
        header("Location:error.php?errMsg={$errMsg}");
        exit;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>UPDATE</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.1.0</h1>
		<hr align="center" size="5" color="BLUE" width="950"></hr>
		<table align="center" style="width: 950">
			<tr>
				<td style="text-align: center; width: 30%">[<a href="./menu.php">メニュー</a>] [<a href="./insert.php">書籍登録</a>] [<a href="./list.php">書籍一覧</a>]</td>
				<td style="font-size: x-large; text-align: center; width: 40%">書籍変更</td>
				<td style="width: 30%"></td>
			</tr>
		</table>
		<hr align="center" size="2" color="black" width="950"></hr>
		<br><br>

		<?php
		//GET送信で受けたデータが有る場合
		if (isset($updateTitle) && isset($updatePrice)) {
		?>
			<table align="center" border="1" style="text-align: center">
    			<tr>
    				<th style="width: 150; background-color: blue; color: white"></th>
    				<th style="width: 200; background-color: blue; color: white">&#60;&#60;変更前情報&#62;&#62;</th>
    				<th style="width: 200; background-color: blue; color: white">&#60;&#60;変更後情報&#62;&#62;</th>
    			</tr>
    			<tr>
    				<td style="background-color: blue; color: white">ISBN</td>
    				<td style="background-color: Lightblue"><?=$isbn?></td>
    				<td><?=$isbn?></td>
    			</tr>
    			<tr>
    				<td style="background-color: blue; color: white">TITLE</td>
    				<td style="background-color: Lightblue"><?=$title?></td>
    				<td><?=$updateTitle?></td>
    			</tr>
    			<tr>
    				<td style="background-color: blue; color: white">価格</td>
    				<td style="background-color: Lightblue"><?=$price?>円</td>
    				<td><?=$updatePrice?></td>
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
        		<table align="center" border="1" style="text-align: center">
        			<tr>
        				<th style="width: 150; background-color: blue; color: white"></th>
        				<th style="width: 200; background-color: blue; color: white">&#60;&#60;変更前情報&#62;&#62;</th>
        				<th style="width: 200; background-color: blue; color: white">&#60;&#60;変更後情報&#62;&#62;</th>
        			</tr>
        			<tr>
        				<td style="background-color: blue; color: white">ISBN</td>
        				<td style="background-color: Lightblue"><?=$isbn?></td>
        				<td><?=$isbn?></td>
        			</tr>
        			<tr>
        				<td style="background-color: blue; color: white">TITLE</td>
        				<td style="background-color: Lightblue"><?=$title?></td>
        				<td><input type="text" name="title"></td>
        			</tr>
        			<tr>
        				<td style="background-color: blue; color: white">価格</td>
        				<td style="background-color: Lightblue"><?=$price?>円</td>
        				<td><input type="text" name="price"></td>
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

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950">
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
    </body>
</html>