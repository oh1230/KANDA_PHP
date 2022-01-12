<?php
    $name = htmlentities($_POST['name'],ENT_QUOTES,'UTF-8');
    $age = htmlentities($_POST['age'],ENT_QUOTES,'UTF-8');
    $message = "";

    if (empty($name) && strlen($name) == 0) {
        $message = "お名前を入力してください。<br>\n";
    }

    if (empty($age) && strlen($age) == 0) {
        $message .= "年令を入力してください。<br>\n";
    }
    elseif (!is_numeric($age)) {
        $message .= "年令は数値で入力してください。<br>\n";
    }

    if ($message == "") {
        $message = "$name さんは $age 歳なんですね。<br>\n";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?=$message?><br>
	<a href="checkForm2.php">入力画面に戻る</a>
    </body>
</html>