<?php
    //フォームからの入力データ取得
    $num = $_POST['number'];

    //||を使って入力数値が０より小さいまたは１０より大きい、よいう複数条件を判定
    if ($num < 0 || $num > 10) {
        $msg = $num."は有効範囲の数値ではありません。\n";
    }
    else {
        $msg = $num."は有効範囲の数値です。\n";
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