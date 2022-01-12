<?php
    /* プログラム名		：detailUser.php
     * プログラム説明	：ユーザーの詳細を表示
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

    $user = $_GET['user'];

    require_once("dbprocess.php");

    $sql = "SELECT * FROM userinfo WHERE user = '{$user}'";

    $result = executeQuery($sql);

    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        $link = "listUser.php";
        $errMsg = "ユーザー情報が存在しない為、詳細情報処理は行えません。";
        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }
    else {
        $row = mysqli_fetch_array($result);

        $password = $row['password'];
        $email = $row['email'];
        if ($row['authority'] == 1) {
            $authority = "管理者";
        }
        else {
            $authority = "一般ユーザー";
        }
    }

    mysqli_free_result($result);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DETAIL USER</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./listUser.php">ユーザー一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>ユーザー詳細</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br>

		<table align="center" style="border: 0; width: 200">
			<tr>
				<td style="width: 100; text-align: center">
            		<form action="updateUser.php" method="GET">
            			<input type="hidden" name="user" value="<?=$user?>">
            			<input type="submit" value="変更">
            		</form>
        		</td>
        		<td style="width: 100; text-align: center">
            		<form action="deleteUser.php" method="GET">
            			<input type="hidden" name="user" value="<?=$user?>">
            			<input type="submit" value="削除">
            		</form>
        		</td>
        	</tr>
		</table>

		<table align="center" style="border: 0; width: 400; text-align: left">
			<tr>
				<td style="width: 150; background-color: orange">　ユーザー</td>
				<td style="width: 250; background-color: silver">　<?=$user?></td>
			</tr>
			<tr>
				<td style="background-color: orange">　パスワード</td>
				<td style="background-color: silver">　<?=$password?></td>
			</tr>
			<tr>
				<td style="background-color: orange">　Eメール</td>
				<td style="background-color: silver">　<?=$email?></td>
			</tr>
			<tr>
				<td style="background-color: orange">　権限</td>
				<td style="background-color: silver">　<?=$authority?></td>
			</tr>
		</table>

		<br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>