<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<form action="changeHtml.php" method="POST">
			<input type="radio" name="flag" value="1" checked/>管理者
			<input type="radio" name="flag" value="2"/>一般ユーザー<br>
			<input type="submit" value="送信">
		</form>
    </body>
</html>