<?php
    setcookie("id",$_POST['id'],time() + 180);
    setcookie("pass",$_POST['pass'],time() + 180);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		ログインしました。
    </body>
</html>