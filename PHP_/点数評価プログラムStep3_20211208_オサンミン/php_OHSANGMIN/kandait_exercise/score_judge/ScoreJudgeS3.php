<?php

/*
 * プログラム名：点数評価プログラム
 * プログラムの説明：点数に応じた評価を表示する。
 * 作成者：オ サン ミン
 * 作成日付：2021年12月28日
 */

//POST送信で貰ったデータを変数$scoreに格納
$score = $_POST["score"];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<h2>点数評価プログラム</h2>
		<!-- フォームでPOST送信　送信先はScoreJudgeS3.php -->
		<form action="ScoreJudgeS3.php" method="POST">
			点数を入力して下さい。
			<!-- 入力した点数の値が残るようにvalueを$scoreで指定 -->
			<input style="width: 50" type="text" name="score" value="<?php echo $score; ?>"><br>
			<input type="submit" value="結果表示">
		</form>
		<br>
		<?php
		    //点数の表示
            print "点数： $score <br>\n";
            //先に０から１００以内の点数かを条件文で判別
            if ($score < 0 || $score > 100) {
                print "結果：範囲外エラー：再度０から１００までの数字を入力してください。<br>\n";
            }
            //点数に応じて評価を表示
            elseif ($score >= 0 && $score < 60) {
                print "結果：評価 F です。<br>\n";
            }
            elseif ($score >= 60 && $score < 70) {
                print "結果：評価 D です。<br>\n";
            }
            elseif ($score >= 70 && $score < 80) {
                print "結果：評価 C です。<br>\n";
            }
            elseif ($score >= 80 && $score < 90) {
                print "結果：評価 B です。<br>\n";
            }
            elseif ($score >= 90 && $score <= 100) {
                print "結果：評価 A です。<br>\n";
            }
		?>
    </body>
</html>