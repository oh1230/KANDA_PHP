<?php
    session_start();

    session_destroy();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		セッションを削除しました。
		<form action="sessionCount.php" method="POST">
			<input type="submit" value="戻る">
		</form>
    </body>
</html>