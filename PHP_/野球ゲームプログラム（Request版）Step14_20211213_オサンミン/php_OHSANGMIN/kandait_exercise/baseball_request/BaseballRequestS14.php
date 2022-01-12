<?php
    $inputNum = $_POST["player_3digit_value"];
    $pattern = "/^[0-9]{3}$/";
    $strikeCount = 0;
    $ballCount = 0;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>野球プログラム</title>
	</head>
    <body>
		<h2>野球プログラム</h2>
		<?php
		  if (isset($_POST['counter'])) {
		      echo "{$_POST['counter']}回目のトライです。";
		      $randArray[0] = $_POST["random_value0"];
		      $randArray[1] = $_POST["random_value1"];
		      $randArray[2] = $_POST["random_value2"];
		  }
		  else {
		      while (true) {
		          for ($i = 0; $i < 3; $i++) {
		              $randArray[$i] = rand(0,9);
		          }
		          if ($randArray[0] != $randArray[1] && $randArray[0] != $randArray[2] && $randArray[1] != $randArray[2]) {
		              break;
		          }
		          else {
		              continue;
		          }
		      }
		  }
		  $_POST['counter']++;
		?>

		<form action="BaseballRequestS14.php" method="POST">
			3桁の数字を入力してください：
			<input type="text" name="player_3digit_value" value="<?php echo $inputNum ?>"><br>
			<input type="hidden" name="counter" value="<?php echo $_POST['counter']; ?>">
			<input type="hidden" name="random_value0" value=<?php echo $randArray[0]; ?>>
			<input type="hidden" name="random_value1" value=<?php echo $randArray[1]; ?>>
			<input type="hidden" name="random_value2" value=<?php echo $randArray[2]; ?>>
			<input type="submit" value="結果表示">
		</form>
		<?php
            echo "入力値： $inputNum <br>\n";

            if (isset($inputNum)) {
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
            }
            echo "正解数：{$randArray[0]}{$randArray[1]}{$randArray[2]}<br>\n";

            for ($i = 0; $i < 3; $i++) {
                if ($randArray[$i] == $playerArray[$i]) {
                    $strikeCount++;
                }
                for ($j = 0; $j < 3; $j++) {
                    if ($i != $j && $randArray[$i] == $playerArray[$j]) {
                        $ballCount++;
                    }
                }
            }

            echo "$strikeCount ストライク $ballCount ボールです。<br>\n";
		?>
    </body>
</html>