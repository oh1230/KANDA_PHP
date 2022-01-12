<?php
    session_start();

    if (isset ($_SESSION['inputData'])) {
        $name = $_SESSION['inputData'][0];

        if ($_SESSION['inputData'][1] == "男性") {
            $man = "checked";
            $woman = "";
        }
        else {
            $man = "";
            $woman = "checked";
        }
    }
    else {
        $name = "";
        $man = "checked";
        $woman = "";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	■入力画面<br>
		<form action="sessionConfirm.php" method="POST">
			お名前：<input type="text" name="name" value="<?=$name?>"><br>
			性別：<input type="radio" name="gender" value="男性"<?=$man?>>男性
				<input type="radio" name="gender" value="女性"<?=$woman?>>女性
			<input type="submit" value="送信">
    </body>
</html>