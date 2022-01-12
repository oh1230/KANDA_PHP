<?php
$title = "デバッグを利用しよう！";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?=$title?></title>
	</head>
    <body>
		<form action="useDebug.php" method="POST">
			１つ目の数値：<input type="text" name="num1" value=""/><br>
			計算方法：<select name="operator">
						<option value="+">+</option>
						<option value="-">-</option>
					</select><br>
			２つ目の数値：<input type="text" name="num2" value=""/><br>
			<input type="submit" value="計算">
		</form>
    </body>
</html>