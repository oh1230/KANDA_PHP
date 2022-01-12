<?php
$score = -5;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<h2>点数評価プログラム</h2>

		<?php
            print "点数： $score <br>\n";

            if ($score < 0 || $score > 100) {
                print "結果：範囲外エラー：再度０から１００までの数字を入力してください。<br>\n";
            }
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