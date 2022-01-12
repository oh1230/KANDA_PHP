<?php
    $score = $_POST['score'];

    if ($score < 0 || $score > 100) {
        $msg = "0～100の間で点数を入力して下さい！";
    }
    else {
        if ($score >= 80) {
            if ($score == 100) {
                $msg = "あなたは、満点で合格しました。<br>\n";
            }
            else {
                $msg = "あなたは、合格しました。<br>\n";
            }
            $msg .= "おめでとうございます！";
        }
        else {
            $msg = "80点未満は不合格です･･･<br>\n 次の機会に向けてがんばりましょう。";
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?=$msg?>
    </body>
</html>