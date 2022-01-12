<?php
    //フォームからの入力データ取得
    $num = $_POST['number'];

    //&&を使って入力数値が０以上かつ１０以下の複数条件を判定
    if (0 <= $num && $num <= 10) {
        $msg = $num."は有効範囲の数値です。\n";
    }
    else {
        $msg = $num."は有効範囲の数値ではありません。\n";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo $msg;
	?>
    </body>
</html>