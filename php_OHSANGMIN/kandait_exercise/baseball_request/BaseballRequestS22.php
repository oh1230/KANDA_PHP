<?php
    /*
     * プログラム名：野球ゲームプログラム
     * プログラムの説明：ランダムな3桁の正解数と
     *                   キーボードから入力を受けた予想数を
     *                   比較して当てるゲーム。
     * 作成者：オ サン ミン
     * 作成日付：2021年12月15日
     */

    //キーボードから入力した数値をPOST送信、変数$inputNumに代入
    $inputNum = $_POST["player_3digit_value"];
    //preg_matchに利用する検索条件を設定（０－９まで数、3桁）
    $pattern = "/^[0-9]{3}$/";

    //正解数と入力値がユニークかどうかを判定するユーザー定義関数
    function isUniqueArray ($tmpArray) {
        if ($tmpArray[0] != $tmpArray[1] && $tmpArray[0] != $tmpArray[2] && $tmpArray[1] != $tmpArray[2]) {
            return true;
        }
        else {
            return false;
        }
    }

    //正解数の乱数を生成するユーザー定義関数
    function createRandomNumber () {
        while (true) {
            for ($i = 0; $i < 3; $i++) {
                $randArray[$i] = rand(1,9);
            }
            if (isUniqueArray($randArray)) {
                break;
            }
            else {
                continue;
            }
        }
        return $randArray;
    }

    //ストライク数をカウントするユーザー定義関数
    function countNumberOfStrikes ($tmpPlayerArray, $tmpRandArray) {
        $tmpStrikeCount = 0;
        for ($i = 0; $i < 3; $i++) {
            if ($tmpRandArray[$i] == $tmpPlayerArray[$i]) {
                $tmpStrikeCount++;
            }
        }
        return $tmpStrikeCount;
    }

    //ボール数をカウントするユーザー定義関数
    function countNumberOfBall($tmpPlayerArray, $tmpRandArray) {
        $tmpBallCount = 0;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($i != $j && $tmpRandArray[$i] == $tmpPlayerArray[$j]) {
                    $tmpBallCount++;
                }
            }
        }
        return $tmpBallCount;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>野球プログラム</title>
	</head>
    <body>
		<h2>野球プログラム</h2>
		<?php
		//正解数（乱数）の発生を初回のみとし、以降は結果表示を何回クリックしても、
		//初回に発生させた乱数が表示されるようにする
		  if (isset($_POST['counter'])) {
		      echo "{$_POST['counter']}回目のトライです。<br><br>";
		      $randArray[0] = $_POST["random_value0"];
		      $randArray[1] = $_POST["random_value1"];
		      $randArray[2] = $_POST["random_value2"];
		  }
		  else {
		      $randArray = createRandomNumber();
		  }
		  $_POST['counter']++;
		?>

		<!-- 同じファイルに入力された予想数をPOST送信 -->
		<form action="BaseballRequestS22.php" method="POST">
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

            //3桁の予想数を分解
            if (isset($inputNum)) {
                if (!preg_match($pattern, $inputNum)) {
                    echo "⇒エラー！！３桁の数字ではありません。<br>\n";
                }
                else {
                    $playerArray[0] = substr($inputNum, 0, 1);
                    $playerArray[1] = substr($inputNum, 1, 1);
                    $playerArray[2] = substr($inputNum, 2, 1);

                    if (isUniqueArray($playerArray)) {
                        echo "⇒ユニークです。<br>\n";
                    }
                    else {
                        echo "⇒ユニークではありません。<br>\n";
                    }
                }
            }
            echo "正解数：{$randArray[0]}{$randArray[1]}{$randArray[2]}<br>\n";

            $strikeCount = countNumberOfStrikes($playerArray, $randArray);
            $ballCount = countNumberOfBall($playerArray, $randArray);

            echo "$strikeCount ストライク $ballCount ボールです。<br>\n";
            if ($strikeCount == 3) {
                echo '<hr style="border: solid 1px gray">';
                echo "3ストライク！アウト！<br>\n";
            }
		?>
    </body>
</html>