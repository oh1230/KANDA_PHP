<?php
    if (isset($_POST['number'])) {
        $num = $_POST['number'];
        $msg = $num . "の数字が好きなんですね！<br>\n";
        $count = $_POST['count'] + 1;
    }
    else {
        $num = "";
        $msg = "【はじめての入力ですね。】<br>\n";
        $count = 1;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<form action="makeOneFileApp3.php" method="POST">
			あなたの好きな数字を入力して下さい。<br>
			<input type="text" name="number" value="<?=$num?>">
			<input type="hidden" name="count" value="<?=$count?>">
			<input type="submit" value="入力">
		</form>
		<?=$msg?>
    </body>
</html>