<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<h2>好きな食べ物を選択してください</h2>
		<form action="formPostResult.php" method="POST">
			<input type="radio" name="favorite" value="野菜">野菜
			<input type="radio" name="favorite" value="魚">魚
			<input type="radio" name="favorite" value="肉">肉
			<input type="submit" value="送信">
		</form>
    </body>
</html>