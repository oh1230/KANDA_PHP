<?php
/* プログラム名		：menu.php
 * プログラム説明	：書籍販売システムのメニュー表示を行う
 * 作成日時			：2022/01/07
 * 作成者			：オ サン ミン
*/
    //セッションでIDと権限を確認
    session_start();

    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    if (!isset($id) || !isset($author)) {
        $errMsg = "セッション切れのため、ログアウトします。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>MENU</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%"></td>
				<td style="width: 33%; text-align: center; padding-top: 1%"><h2>MENU</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br><br><br>

		<?php
		if ($author == "管理者") {
		?>
		<table align="center" style="text-align: left">
			<tr><td><a href="./list.php">【書籍一覧】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./insert.php">【書籍登録】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./insertIniData.php">【初期データ登録(データがない場合のみ)】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./orderStatus.php">【購入状況確認】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./showSalesByMonth.php">【売上げ状況】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./insertUser.php">【ユーザー登録】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./listUser.php">【ユーザー一覧】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./changePassword.php">【パスワード変更】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./logout.php">【ログアウト】</a></td></tr>
		</table>
		<?php
		}
		elseif ($author == "一般ユーザー") {
		?>
		<table align="center" style="text-align: left">
			<tr><td><a href="./list.php">【書籍一覧】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./showCart.php">【カート状況確認】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./orderHistory.php">【購入履歴】</a></td></tr>
			<tr><td><br><br></td></tr>
			<tr><td><a href="./changePassword.php">【パスワード変更】</a></td></tr>
			<tr><td><br></td></tr>
			<tr><td><a href="./logout.php">【ログアウト】</a></td></tr>
		</table>
		<?php
		}
		else {
		    $errMsg = "権限がありません。";
		    $link = "logout.php";

		    header("Location:error.php?errMsg={$errMsg}&link={$link}");
		    exit;
		}
		?>
		<br><br><br>
		<hr align="center" size="5" color="orange" width="950">
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
	</body>
</html>