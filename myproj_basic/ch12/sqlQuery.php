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

    //接続情報を取得し$link_infoに格納
    $link_info = mysqli_get_host_info($link);

    //SQL文の用意
    $sql = "SELECT id,name,price FROM iteminfo";

    //SQL文の発行
    $result = mysqli_query($link, $sql) or die ("SQL文「 $sql 」の発行に失敗しました。");

    //検索結果の件数を取得
    $rows = mysqli_num_rows($result);

    //検索結果の開放
    mysqli_free_result($result);

    //MySQLへの接続を閉じる
    mysqli_close($link) or die ("MySQLサーバの切断に失敗しました。");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		接続情報：<?=$link_info?><br>
		検索件数：<?=$rows?>
    </body>
</html>