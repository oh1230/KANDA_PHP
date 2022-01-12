<?php
    if (isset ($_COOKIE['id'])) {
        $beforeId = $_COOKIE['id'];
        $beforePass = $_COOKIE['pass'];
    }
    else {
        $beforeId = "";
        $beforePass = "";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<form action="setCookie.php" method="POST">
			ID : <input type="text" name="id" value="<?=$beforeId?>"><br>
			PASS : <input type="text" name="pass" value="<?=$beforePass?>"><br>
			<input type="submit" value="ログイン">
		</form>
    </body>
</html>