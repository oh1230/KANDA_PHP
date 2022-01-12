<?php
    function calc($num1,$num2) {
        return $num1 + $num2;
    }

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    $result = calc($num1,$num2);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	■計算結果<br>
	<?=$num1 . "+" . $num2 . "=" . $result?>
    </body>
</html>