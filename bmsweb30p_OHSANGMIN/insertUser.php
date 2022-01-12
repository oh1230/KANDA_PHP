<?php
    /* プログラム名		：insertUser.php
     * プログラム説明	：新しいユーザーを登録する
     * 作成日時			：2022/01/07
     * 作成者			：オ サン ミン
     */

    session_start();
    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    if (!isset($id) || !isset($author)) {
        $errMsg = "権限がありません。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

    $msg = "";
    $judge = FALSE;

    require_once("dbprocess.php");

    $user = $_POST['user'];
    $password = $_POST['password'];
    $checkPassword = $_POST['checkPassword'];
    $email = $_POST['email'];
    $authority = $_POST['authority'];

    if (isset($user)) {
        if ($user == "" || $password == "" || $checkPassword == "" || $email == "" || $authority == "") {
            $msg = "未入力情報はあります。";
        }
        else {
            if ($password != $checkPassword) {
                $msg = "パスワード確認が一致しません。";
            }
            else {
                $sql = "SELECT * FROM userinfo WHERE user LIKE '{$user}'";
                $result = executeQuery($sql);
                $rows = mysqli_num_rows($result);
                if ($rows != 0) {
                    $msg = "既に登録済みのユーザーです。";
                }
                else {
                    $msg = "上記ユーザーを登録しました。";
                    $sql = "INSERT INTO userinfo VALUES('{$user}','{$password}','{$email}','{$authority}')";
                    $result = executeQuery($sql);
                    $judge = TRUE;
                }
            }
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>INSERT USER</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./listUser.php">ユーザー一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>ユーザー登録</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br>

		<?php
		if ($judge) {
		?>
			<table align="center" style="text-align: center; width: 400">
    			<tr>
    				<td style="width: 200; background-color: orange">ユーザー</td>
    				<td style="width: 200; background-color: silver"><?=$user?></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">パスワード</td>
    				<td style="background-color: silver"><?=$password?></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">Eメール</td>
    				<td style="background-color: silver"><?=$email?></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">権限</td>
    				<td style="background-color: silver">
    					<?php
    					if ($authority == 1) {
    					    echo "管理者";
    					}
    					else {
    					    echo "一般ユーザー";
    					}
    					?>
    				</td>
    			</tr>
    		</table>
    		<div style="text-align: center"><?=$msg?></div>
    		<br>
    		<div style="text-align: center"><a href="listUser.php">ユーザー一覧へ戻る</a>　　<a href="insertUser.php">続けて登録する</a></div>
    		<br>
		<?php
		}
		else {
		?>
		<form style="align: center" action="insertUser.php" method="POST">
    		<table align="center" style="text-align: center; width: 400">
    			<tr>
    				<td style="width: 200; background-color: orange">ユーザー</td>
    				<td style="width: 200; background-color: silver"><input style="border: 0; width: 200; background-color: silver" type="text" name="user" value=""/></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">パスワード</td>
    				<td style="background-color: silver"><input style="border: 0; width: 200; background-color: silver" type="password" name="password" value=""/></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">パスワード(確認用)</td>
    				<td style="background-color: silver"><input style="border: 0; width: 200; background-color: silver" type="password" name="checkPassword" value=""/></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">Eメール</td>
    				<td style="background-color: silver"><input style="border: 0; width: 200; background-color: silver" type="text" name="email" value=""/></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">権限</td>
    				<td style="background-color: silver">
    					<select style="border: 0; width: 200; background-color: silver" type="" name="authority">
    						<option value="" selected disabled hidden>＝＝権限選択＝＝</option>
    						<option value="1">管理者</option>
    						<option value="2">一般ユーザー</option>
    					</select>
    				</td>
    			</tr>
    		</table>
    		<div style="text-align: center"><?=$msg?></div>
    		<br>
			<p style="text-align: center"><input type="submit" value="登録"></p>
		</form>
		<?php
		}
		?>

		<br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>