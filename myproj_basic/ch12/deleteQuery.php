<?php
    header ('Content-type: text/html; charset=UTF-8');

    $url = "localhost";
    $user = "root";
    $pass = "root123";
    $db = "itemdb";

    //Mysql サーバ接続
    $link = mysqli_connect($url,$user,$pass) or die("MySQLサーバへの接続に失敗しました。");

    //データベース選択
    mysqli_select_db($link, $db) or die ("$db の選択に失敗しました。");

    //SQL文の用意
    $sql = "DELETE FROM iteminfo WHERE id = '{$_POST['id']}'";

    //SQL文の発行
    $result = mysqli_query($link, $sql) or die ("SQL文「 $sql 」の発行に失敗しました。");

    ////Mysql サーバ接続を閉じる
    mysqli_close($link) or die("MySQLサーバの切断に失敗しました。");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		商品ID：<?=$_POST['id']?>の削除を行いました。<br>
		<a href="selectAll.php">商品一覧へ</a>
    </body>
</html>