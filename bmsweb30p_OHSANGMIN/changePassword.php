<?php
    /* プログラム名		：changePassword.php
     * プログラム説明	：パスワード変更
     * 作成日時			：2022/01/07
     * 作成者			：オ サン ミン
     */

    //セッションでユーザー名と権限を持ってくる
    session_start();

    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    //入力を受けた数値を持ってくる
    $pastPass = $_POST['pastPass'];
    $newPass = $_POST['newPass'];
    $checkNewPass = $_POST['checkNewPass'];

    //DB接続
    require_once("dbprocess.php");

    $sql = "SELECT password FROM userinfo WHERE user = '{$user}'";
    $result = executeQuery($sql);

    $row = mysqli_fetch_array($result);

    $password = $row['password'];

    mysqli_free_result($result);

    //正しいパスワード変更のための条件
    if (!isset($pastPass)) {
        $msg = "";
    }
    elseif ($pastPass == "") {
        $msg = "旧パスワードを入力してください。";
    }
    elseif ($newPass == "") {
        $msg = "新しいパスワードを入力してください。";
    }
    else {
        if ($password != $pastPass) {
            $msg = "旧パスワードに誤りがあります。";
        }
        else {
            if ($newPass != $checkNewPass) {
                $msg = "新しいパスワードの確認が一致いません。";
            }
            else {
                $sql = "UPDATE userinfo SET password = '{$newPass}' WHERE user = '{$user}'";
                $result = executeQuery($sql);
                $msg = "パスワードを変更しました。";
            }
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>CHANGE PASSWORD</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>パスワード変更</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br>

		<form action="changePassword.php" method="POST" style="text-align: center">
        		<table align="center" style="text-align: left; width: 400">
        			<tr>
        				<th style="background-color: orange; width: 200">ユーザー</th>
        				<td style="background-color: silver; width: 200"><?=$id?></td>
        			</tr>
        			<tr>
        				<th style="background-color: orange">旧パスワード</th>
        				<td style="background-color: silver"><input style="border: 0; width: 200; background-color: silver" type="text" name="pastPass"></td>
        			</tr>
        			<tr>
        				<th style="background-color: orange">新パスワード</th>
        				<td style="background-color: silver"><input style="border: 0; width: 200; background-color: silver" type="text" name="newPass"></td>
        			</tr>
        			<tr>
        				<th style="background-color: orange">新パスワード(確認用)</th>
        				<td style="background-color: silver"><input style="border: 0; width: 200; background-color: silver" type="text" name="checkNewPass"></td>
        			</tr>
        		</table>
        		<br>
        		<div style="color: red"><?=$msg?></div><br>
    			<input type="submit" value="変更">
    		</form>

		<br><br><br><br>
		<hr align="center" size="5" color="orange" width="950">
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>