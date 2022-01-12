<?php
$url = "localhost";
$user = "root";
$pass = "root123";

$link = mysqli_connect($url,$user,$pass);

$link_info = mysqli_get_host_info($link);

mysqli_close($link);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	接続情報：<?=$link_info?>
    </body>
</html>