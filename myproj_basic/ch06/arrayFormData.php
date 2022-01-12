<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<form action="receiveArrayFormData.php" method="POST">
		お名前：<input type="text" name="personal[name]" value=""/><br>
		年令：<input type="text" name="personal[age]" value=""/><br>
		お好きな趣味を選択して下さい(複数選択可能)：<br>
		読書：<input type="checkbox" name="hobby[]" value="読書">
		料理：<input type="checkbox" name="hobby[]" value="料理">
		映画鑑賞：<input type="checkbox" name="hobby[]" value="映画鑑賞">
		音楽演奏：<input type="checkbox" name="hobby[]" value="音楽演奏">
		プログラム：<input type="checkbox" name="hobby[]" value="プログラム">
		その他：<input type="checkbox" name="hobby[]" value="その他">
		<input type="submit" value="送信">
	</form>
    </body>
</html>