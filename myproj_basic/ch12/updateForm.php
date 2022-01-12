<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<form action="updateQuery.php" method="POST">
			変更対象の商品ID：<input type="text" name="id" value=""/><br>
			<hr>
			変更後の商品名：<input type="text" name="name" value=""/><br>
			変更後の価格：<input type="text" name="price" value=""/><br>
			<input type="submit" value="変更">
		</form>
    </body>
</html>