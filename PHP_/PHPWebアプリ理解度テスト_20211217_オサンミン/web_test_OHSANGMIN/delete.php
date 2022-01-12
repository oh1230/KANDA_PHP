<?php
    session_start();

    $delId = $_POST['delId'];

    header ('Content-type: text/html; charset=UTF-8');

    $url = "localhost";
    $user = "root";
    $pass = "root123";
    $db = "testdb";

    $link = mysqli_connect($url,$user,$pass) or die("MySQLサーバへの接続に失敗しました。");

    mysqli_select_db($link, $db) or die ("$db の選択に失敗しました。");

    $sql = "DELETE FROM employeeinfo WHERE id = '{$delId}'";

    $result = mysqli_query($link, $sql) or die ("SQL文「 $sql 」の発行に失敗しました。");

    mysqli_close($link) or die("MySQLサーバの切断に失敗しました。");

    if (isset($delId)) {
        $_SESSION['delId'] = "$delId";
        header ('Location:list.php');
        exit;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<a href="index.php">index.phpに戻る</a><br>

		<h2>従業員の削除</h2>

		<form action="delete.php" method="POST">
			削除対象ID：<input type="text" name="delId"><br>
			<br>
			<input type="submit" value="削除">
		</form>
    </body>
</html>