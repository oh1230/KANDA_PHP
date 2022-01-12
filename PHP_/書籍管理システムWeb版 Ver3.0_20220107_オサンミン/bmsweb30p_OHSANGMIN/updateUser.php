<?php
    /* プログラム名		：updateUser.php
     * プログラム説明	：ユーザー情報更新
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

    $errMsg = "";
    $judge = FALSE;

    $user = $_GET['user'];
    $updatePassword = $_GET['updatePassword'];
    $checkPassword = $_GET['checkPassword'];
    $updateEmail = $_GET['updateEmail'];
    if ($_GET['updateAuthority'] == 1) {
        $updateAuthority = "管理者";
    }
    else {
        $updateAuthority = "一般ユーザー";
    }

    require_once("dbprocess.php");

    $sql = "SELECT * FROM userinfo WHERE user = '{$user}'";

    $result = executeQuery($sql);

    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        $link = "listUser.php";
        $errMsg = "更新対象のユーザーが存在しない為、更新処理は行えませんでした。 ";
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

    if (isset($updatePassword)) {
        if ($updatePassword == "" || $checkPassword == "" || $updateEmail == "" || $updateAuthority == "") {
            $link = "listUser.php";
            $errMsg = "未入力の情報が存在する為、更新処理は行えませんでした。 ";
        }
        else {
            if ($updatePassword != $checkPassword) {
                $link = "listUser.php";
                $errMsg = "パスワード確認が一致しない為、更新処理は行えませんでした。 ";
            }
            else {
                $sqlUpdate = "UPDATE userinfo SET password='{$updatePassword}', email='{$updateEmail}', authority='{$_GET['updateAuthority']}' WHERE user = '{$user}'";
                $resultUpdate = executeQuery($sqlUpdate);
                $judge = TRUE;
            }
        }
    }
    mysqli_free_result($result);

    if ($errMsg != "") {
        //error.phpに引数errMsgを持って飛ばす
        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>UPDATE USER</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 40%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./insertUser.php">ユーザー登録</a>]&emsp;[<a href="./listUser.php">ユーザー一覧</a>]</td>
				<td style="width: 20%; text-align: center; padding-top: 3%"><h2>ユーザー変更</h2></td>
				<td style="width: 40%; text-align: right; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br>

		<?php
		//GET送信で受けたデータが有る場合
		if ($judge) {
		?>
			<table align="center" style="text-align: left; width: 650">
    			<tr>
    				<th style="width: 150; background-color: orange"></th>
    				<th style="text-align: center; width: 250; background-color: orange">&#60;&#60;変更前情報&#62;&#62;</th>
    				<th style="text-align: center; width: 250; background-color: orange">&#60;&#60;変更後情報&#62;&#62;</th>
    			</tr>
    			<tr>
        			<td style="background-color: orange">ユーザー</td>
        			<td style="background-color: silver"><?=$user?></td>
        			<td style="background-color: silver"><?=$user?></td>
        		</tr>
    			<tr>
    				<td style="background-color: orange">パスワード</td>
    				<td style="background-color: silver"><?=$password?></td>
    				<td style="background-color: silver"><?=preg_replace('/./u', '⋆', $updatePassword)?></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">Eメール</td>
    				<td style="background-color: silver"><?=$email?></td>
    				<td style="background-color: silver"><?=$updateEmail?></td>
    			</tr>
    			<tr>
    				<td style="background-color: orange">権限</td>
    				<td style="background-color: silver"><?=$authority?></td>
    				<td style="background-color: silver"><?=$updateAuthority?></td>
    			</tr>
    		</table>
    		<p style="text-align: center">
        		上記内容でデータを更新しました。<br>
        		<a href="listUser.php">ユーザー一覧へ戻る</a>
    		</p>

		<?php
		} else {
		?>
    		<form action="updateUser.php" method="GET" style="text-align: center">
        		<table align="center" style="text-align: left; width: 650">
        			<tr>
        				<th style="width: 150; background-color: orange"></th>
        				<th style="text-align: center; width: 250; background-color: orange">&#60;&#60;変更前情報&#62;&#62;</th>
        				<th style="text-align: center; width: 250; background-color: orange">&#60;&#60;変更後情報&#62;&#62;</th>
        			</tr>
        			<tr>
            			<td style="background-color: orange">ユーザー</td>
            			<td style="background-color: silver"><?=$user?></td>
            			<td style="background-color: silver"><?=$user?></td>
            		</tr>
        			<tr>
        				<td style="background-color: orange">パスワード</td>
    					<td style="background-color: silver"><?=$password?></td>
        				<td style="background-color: silver"><input style="border: 0; width: 250; background-color: silver" type="password" name="updatePassword"></td>
        			</tr>
        			<tr>
        				<td style="background-color: orange">パスワード(確認用)</td>
    					<td style="background-color: silver"></td>
        				<td style="background-color: silver"><input style="border: 0; width: 250; background-color: silver" type="password" name="checkPassword"></td>
        			</tr>
        			<tr>
        				<td style="background-color: orange">Eメール</td>
    					<td style="background-color: silver"><?=$email?></td>
        				<td style="background-color: silver"><input style="border: 0; width: 250; background-color: silver" type="text" name="updateEmail"></td>
        			</tr>
        			<tr>
        				<td style="background-color: orange">権限</td>
        				<td style="background-color: silver"><?=$authority?></td>
        				<td style="background-color: silver">
        					<select name="updateAuthority" style="border: 0; background-color: silver; width: 250">
        						<option value="1">管理者</option>
        						<option value="2">一般ユーザー</option>
        					</select>
        				</td>
        			</tr>
        		</table>
        		<br>
        		<input type="hidden" name="user" value="<?=$user?>">
    			<input type="submit" value="変更完了">
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