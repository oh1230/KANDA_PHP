<?php
    header ('Content-type: text/html; charset=UTF-8');

    $url = "localhost";
    $user = "root";
    $pass = "root123";
    $db = "itemdb";

    $link = mysqli_connect($url,$user,$pass) or die("MySQLサーバへの接続に失敗しました。");

    mysqli_select_db($link, $db) or die ("$db の選択に失敗しました。");

    $link_info = mysqli_get_host_info($link);

    mysqli_close($link) or die ("MySQLサーバの切断に失敗しました。");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	接続ID：<?=$link_info?>
    </body>
</html>