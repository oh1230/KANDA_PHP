<?php
    //正解数の変数
    $ansNum = 5;
    $userNum = $_POST['userNum'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<h2>数字当てプログラム</h2>

		<form action ="GuessNumRequestS04.php" method="POST">
		０から９までの数値を入力してください。：
		<input type="text" name="userNum" value="<?php echo $userNum; ?>">
		<input type="submit" value="結果表示">
		</form>
		<br>
		<?php
            echo "予想数： $userNum <br>\n";
            echo "正解数： $ansNum <br>\n<br>";
            if ($userNum < 0 || $userNum > 9) {
                echo "エラー！！０から９の数字ではありません。<br>\n";
            }
            elseif ($userNum == $ansNum) {
                echo "！！大当たり！！<br>\n";
            }
            elseif ($userNum < $ansNum) {
                echo "$userNum より大きいです。<br>\n";
            }
            elseif ($userNum > $ansNum) {
                echo "$userNum より小さいです。<br>\n";
            }
		?>
    </body>
</html>