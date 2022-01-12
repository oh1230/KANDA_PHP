<?php
    /* プログラム名		：login.php
     * プログラム説明	：ログイン画面
     * 作成日時			：2021/12/23
     * 作成者			：オ サン ミン
    */
    //セッションでIDと権限を確認
    session_start();
    $id = $_POST['id'];
    $password = $_POST['password'];

    if (isset($id)) {
        if ($id == "") {
            $msg = "IDを入力してください。";
        }
        elseif ($password == "") {
            $msg = "パスワードを入力してください。";
        }
        else {
            if ($id == "admin" && $password == "9999") {
                $_SESSION['id'] = $id;
                $_SESSION['author'] = "管理者";
                header ('Location: menu.php');
                exit;
            }
            elseif ($id == "user" && $password == "1111") {
                $_SESSION['id'] = $id;
                $_SESSION['author'] = "一般ユーザ";
                header ('Location: menu.php');
                exit;
            }
            else {
                $msg = "IDやパスワードに誤りがあります。";
            }
        }

    }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>LOGIN</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%"></td>
				<td style="width: 33%; text-align: center;"><h2>ログイン画面</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%"></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br>

		<form align="center" action="login.php" method="POST">
    		<table align="center" style="border-collapse: collapse">
    			<tr>
    				<th style="border: 1px solid; text-align: left; width: 100px; background-color: orange">ユーザー</th>
    				<td style="border: 1px solid"><input style="border: 0" type="text" name="id"></td>
    			</tr>
    			<tr>
    				<th style="border: 1px solid; text-align: left; background-color: orange">パスワード</th>
    				<td style="border: 1px solid"><input style="border: 0" type="password" name="password"></td>
    			</tr>
    		</table>
    		<p style="color: red">&emsp;<?=$msg?>&emsp;</p>
    		<input type="submit" value="login">
		</form>

		<br><br><br><br><br><br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950">
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
	</body>
</html>