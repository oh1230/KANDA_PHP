<?php
    /*
     * プログラム名：数字当てプログラム
     * プログラムの説明：予想数値と正解数値を比較かする
     * 作成者：オ サン ミン
     * 作成日付：2021年12月10日
     */

    //変数userNumを宣言、スーパーグローバル変数「$_POST["random_value"]」に値を代入
    $userNum = $_POST['player_value'];

    //random_valueにデータが有るが判断、有るとそのまま変数ansNumに代入、無かったらランダム数字代入
    if (isset($_POST["random_value"])) {
        $ansNum = $_POST['random_value'];
    }
    else {
        $ansNum = mt_rand(0,9);
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>数字当てプログラム</title>
    </head>
<body>
	<h2>数字当てプログラム</h2>

	<!-- GuessNumRequestS06.phpにPOST送信 -->
	<form action="GuessNumRequestS06.php" method="POST">
		０から９までの数値を入力してください。：
		<input type="text" name="player_value" value="<?php echo $userNum; ?>">
		<input type="hidden" name="random_value" value="<?php echo $ansNum; ?>">
		<input type="submit" value="結果表示">
	</form>
	<br>
		<?php
            echo "予想数： $userNum <br>\n";
            echo "正解数： $ansNum <br>\n<br>";

            //スーパーグローバル変数で受け取った値が入ってるか判断、
            //有ると条件文にしたがって文字列を出力
            if (isset($_POST["player_value"])) {
                if ($userNum < 0 || $userNum > 9) {
                    echo "エラー！！０から９の数字ではありません。<br>\n";
                } elseif ($userNum == $ansNum) {
                    echo "！！大当たり！！<br>\n";
                } elseif ($userNum < $ansNum) {
                    echo "$userNum より大きいです。<br>\n";
                } elseif ($userNum > $ansNum) {
                    echo "$userNum より小さいです。<br>\n";
                }
            }
        ?>
    </body>
</html>