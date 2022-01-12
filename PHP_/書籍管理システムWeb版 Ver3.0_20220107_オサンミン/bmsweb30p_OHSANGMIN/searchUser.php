<?php
/* プログラム名		：searchUser.php
 * プログラム説明	：ユーザー検索
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

    $user = $_POST['user'];

    require_once("dbprocess.php");

    $sql = "SELECT * FROM userinfo WHERE user LIKE '%{$user}%'";

    $result = executeQuery($sql);

    $rows = mysqli_num_rows($result);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>SEARCH USER</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./insertUser.php">ユーザー登録</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>ユーザー一覧</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br>

		<table align="center" style="border: 0; width: 800">
			<tr align="left" style="text-align: left">
				<td style="width: 400">
					<form action="./searchUser.php" method="post">
						ユーザー<input type="text" name="user" value="<?=$user?>" style="width: 200"/>　　　
						<input type="submit" value="検索" />
					</form>
				</td>
				<td>
					<form action="./listUser.php"><input type="submit" value="全件表示" /></form>
				</td>
			</tr>
		</table>
		<br>

		<table align="center" style="border: 0; width: 800">
			<tr >
				<th bgcolor="orange" width="200">ユーザー</th>
				<th bgcolor="orange" width="200">Eメール</th>
				<th bgcolor="orange" width="200">権限</th>
				<th bgcolor="orange" width="200">更新/削除</th>
			</tr>
			<?php
			//検索結果を表示
			if($rows){
				while($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td align="center"><a href="detailUser.php?user=<?=$row["user"]?>" target="_self"><?=$row["user"]?></a></td>
				<td align="center"><?=$row["email"]?></td>
				<td align="center">
					<?php
					if ($row['authority'] == 1) {
					    echo "管理者";
					}
					else {
					    echo "一般ユーザー";
					}
					?>
				</td>
				<td align="center">
					<a href="updateUser.php?user=<?=$row["user"]?>" target="_self">更新</a>　
					<a href="deleteUser.php?user=<?=$row["user"]?>" target="_self">削除</a>
				</td>
			</tr>
			<?php
				}
			}else{
			?>
			<tr>
				<td colspan="4" align="center">
					ユーザー情報がありません。
				</td>
			</tr>
			<?php
			}
			?>
		</table>

		<br><br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>