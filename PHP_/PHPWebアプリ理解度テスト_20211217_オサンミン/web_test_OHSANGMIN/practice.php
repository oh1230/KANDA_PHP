<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<a href="index.php">index.phpに戻る</a><br>

		<h2>フォームからのGET送信</h2>
		<form action="result.php" method="GET">
		<input type="hidden" name="cmd" value="get">
		<input type="submit" value="送信">
		</form>

		<h2>フォームからのPOST送信</h2>
		<form action="result.php" method="POST">
		<input type="hidden" name="cmd" value="post">
		<input type="submit" value="送信">
		</form>

		<h2>リンクからの送信</h2>
		<a href="result.php?cmd=link">送信</a>

    </body>
</html>