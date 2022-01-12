<?php
    $inputNum = $_POST["player_3digit_value"];
    $pattern = "/^[0-9]{3}$/";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>野球プログラム</title>
	</head>
    <body>
		<h2>野球プログラム</h2>

		<form action="BaseballRequestS03.php" method="POST">
			3桁の数字を入力してください：
			<input type="text" name="player_3digit_value" value="<?php echo $inputNum ?>"><br>
			<input type="submit" value="結果表示">
		</form>
		<?php
            echo "入力値： $inputNum <br>\n";

            if (!preg_match($pattern, $inputNum)) {
                echo "⇒エラー！！３桁の数字ではありません。<br>\n";
            }
		?>
    </body>
</html>