<?php
/* プログラム名		：insert.php
 * プログラム説明	：新しい書籍を登録する
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

    //SQLに接続する
    require_once("dbprocess.php");

    //POST送信で受け取ったデータを変数に格納
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $price = $_POST['price'];

    //変数errMsgを宣言と初期化
    $errMsg = "";

    //もしisbn,title,priceにデータがあった場合（ボタンを押した場合）
    if (isset($isbn) && isset($title) && isset($price)) {
        //isbn,title,priceに何も入力されてないままボタンを押した場合errMsgに文字列を代入
        if ($isbn == "") {
            $link = "list.php";
            $errMsg = "ISBNが未入力の為、登録処理は行えませんでした。";
        }
        elseif ($title == "") {
            $link = "list.php";
            $errMsg = "TITLEが未入力の為、登録処理は行えませんでした。";
        }
        elseif ($price == "") {
            $link = "list.php";
            $errMsg = "価格が未入力の為、登録処理は行えませんでした。";
        }
        //isbn,title,priceに入力をした場合
        else {
            if (is_numeric($price)) {
                //ISBN重複チェック
                $sql = "SELECT * FROM bookinfo WHERE isbn LIKE '{$isbn}'";

                $result = executeQuery($sql);
                $rows = mysqli_num_rows($result);

                if ($rows == 0) {
                    //SQL文を実行、入力されたデータをデータベースに登録
                    $sql = "INSERT INTO bookinfo VALUES('{$isbn}','{$title}',{$price})";

                    $result = executeQuery($sql);
                }
                else {
                    $link = "menu.php";
                    $errMsg = "既に登録されているISBNです。";
                }
            }
            else {
                $link = "menu.php";
                $errMsg = "価格の値が半角数字ではありません。";
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
		<title>INSERT</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>書籍登録</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br><br>


		<?php
		//変数isbnにデータが入ってる場合
		if (isset($isbn)) {
		?>
		<div style="text-align: center">
		<table align="center" style="text-align: center; width: 300">
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
		<p>上記データを登録しました。</p>
		<a href="list.php">書籍一覧へ戻る</a> &emsp;
		<a href="insert.php">続けて登録する</a>
		</div>
		<?php
		//変数isbnにデータが無い場合
		} else {
		?>
		<form style="align: center" action="insert.php" method="POST">
    		<table align="center" style="text-align: center; width: 300">
    			<tr>
    				<td style="width: 150; background-color: orange">ISBN</td>
    				<td style="width: 150; background-color: silver"><input style="border: 0; width: 150; background-color: silver" type="text" name="isbn" value=""/></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">TITLE</td>
    				<td style="width: 150; background-color: silver"><input style="border: 0; width: 150; background-color: silver" type="text" name="title" value=""/></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">価格</td>
    				<td style="width: 150; background-color: silver"><input style="border: 0; width: 150; background-color: silver" type="text" name="price" value=""/></td>
    			</tr>
    		</table><br>
			<p style="text-align: center"><input type="submit" value="登録"></p>
		</form>
		<?php
		}
		?>


		<br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>