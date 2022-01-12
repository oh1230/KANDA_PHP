<?php
    session_start();

    if (isset ($_SESSION['count'])) {
        $_SESSION['count']++;
    }
    else {
        $_SESSION['count'] = 0;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		セッションカウント：<?=$_SESSION['count']?>回<br><br>
		<table>
			<tr>
				<td>
					<form action="sessionCount.php" method="POST">
						<input type="submit" value="カウントアップ">
					</form>
				</td>
				<td>
					<form action="sessionPageMove.php" method="POST">
						<input type="submit" value="別の画面に移動">
					</form>
				</td>
				<td>
					<form action="sessionDelete.php" method="POST">
						<input type="submit" value="セッション削除">
					</form>
				</td>
			</tr>
		</table>
    </body>
</html>