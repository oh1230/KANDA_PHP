<?php
    if (isset($_POST['number'])) {
        $msg = $_POST['number'] . "の数字が好きなんですね！<br>\n";
    }
    else {
        $msg = "【はじめての入力ですね。】<br>\n";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<form action="makeOneFileApp2.php" method="POST">
			あなたの好きな数字を入力して下さい。<br>
			<input type="text" name="number" value="">
			<input type="submit" value="入力">
		</form>
		<?=$msg?>
    </body>
</html>