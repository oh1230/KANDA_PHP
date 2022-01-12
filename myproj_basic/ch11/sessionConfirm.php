<?php
    session_start();

    $_SESSION['inputData'] = array($_POST['name'],$_POST['gender']);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		■確認画面<br>
		以下の入力内容で確認してよろしいですか？<br><br>
		お名前：<?=$_SESSION['inputData'][0]?><br>
		性別：<?=$_SESSION['inputData'][1]?><br><br>
		<a href="sessionForm.php">修正する</a>
		<a href="sessionResult.php">確認する</a>
    </body>
</html>