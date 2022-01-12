<?php

/*
 * プログラム名：点数評価プログラム
 * プログラムの説明：点数に応じた評価を表示する。
 * 作成者：オ サン ミン
 * 作成日付：2021年12月14日
 */

//POST送信で貰ったデータを変数$scoreに格納
$score = $_POST["score"];

//関数：evaluateScore($score)
function evaluateScore($score) {
    if ($score < 0 || $score > 100) {
        return "Z";
    }
    //点数に応じて評価を表示
    elseif ($score >= 0 && $score < 60) {
        return "F";
    }
    elseif ($score >= 60 && $score < 70) {
        return "D";
    }
    elseif ($score >= 70 && $score < 80) {
        return "C";
    }
    elseif ($score >= 80 && $score < 90) {
        return "B";
    }
    elseif ($score >= 90 && $score <= 100) {
        return "A";
    }
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<h2>点数評価プログラム</h2>
		<!-- フォームでPOST送信　送信先はScoreJudgeS3.php -->
		<form action="ScoreJudgeS4.php" method="POST">
			点数を入力して下さい。
			<!-- 入力した点数の値が残るようにvalueを$scoreで指定 -->
			<input style="width: 50" type="text" name="score" value="<?php echo $score; ?>"><br>
			<input type="submit" value="結果表示">
		</form>
		<br>
		<?php
		    //点数の表示
            echo "点数： $score <br>\n";

            $result = evaluateScore($score);

            if ($result == "Z") {
                echo "範囲外エラー：再度０から１００までの数字を入力してください。<br>\n";
            }
            else {
                echo "結果：評価 $result です。<br>\n";
            }
		?>
    </body>
</html>