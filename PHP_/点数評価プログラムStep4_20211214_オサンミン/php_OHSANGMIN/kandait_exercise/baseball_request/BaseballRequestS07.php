<?php
    $inputNum = $_POST["player_3digit_value"];
    $pattern = "/^[0-9]{3}$/";

    for ($i = 0; $i < 3; $i++) {
        $randArray[$i] = rand(0,9);
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>野球プログラム</title>
	</head>
    <body>
		<h2>野球プログラム</h2>

		<form action="BaseballRequestS07.php" method="POST">
			3桁の数字を入力してください：
			<input type="text" name="player_3digit_value" value="<?php echo $inputNum ?>"><br>
			<input type="submit" value="結果表示">
		</form>
		<?php
            echo "入力値： $inputNum <br>\n";

            if (!preg_match($pattern, $inputNum)) {
                echo "⇒エラー！！３桁の数字ではありません。<br>\n";
            }
            else {
                $playerArray[0] = substr($inputNum, 0, 1);
                $playerArray[1] = substr($inputNum, 1, 1);
                $playerArray[2] = substr($inputNum, 2, 1);

                if ($playerArray[0] != $playerArray[1] && $playerArray[0] != $playerArray[2] && $playerArray[1] != $playerArray[2]) {
                    echo "⇒ユニークです。<br>\n";
                }
                else {
                    echo "⇒ユニークではありません。<br>\n";
                }
            }

            echo "正解数：{$randArray[0]}{$randArray[1]}{$randArray[2]}<br>\n";
            if ($randArray[0] != $randArray[1] && $randArray[0] != $randArray[2] && $randArray[1] != $randArray[2]) {
                echo "⇒ユニークです。<br>\n";
            }
            else {
                echo "⇒ユニークではありません。<br>\n";
            }
		?>
    </body>
</html>