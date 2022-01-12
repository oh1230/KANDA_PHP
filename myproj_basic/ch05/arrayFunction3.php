<?php
    $foods = array("カレーライス", "ラーメン", "焼肉", "寿司", "ハンバーグ");

    if (in_array($_POST['food'], $foods)) {
        $msg = "あなたの好きな「{$_POST['food']}」は、人気料理のTOP5に入っています。";
    }
    else {
        $msg = "あなたの好きな「{$_POST['food']}」は、人気料理のTOP5に入っていません。";
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