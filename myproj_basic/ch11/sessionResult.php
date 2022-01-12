<?php
    session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		■結果画面<br>
		<?=$_SESSION['inputData'][0] . "(" . $_SESSION['inputData'][1] . ")"?>様<br><br>
		ご協力ありがとうございました。
    </body>
</html>