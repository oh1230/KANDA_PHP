<?php
    $result = calc($_POST['num1'],$_POST['num2'],$_POST['operator']);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	■計算結果<br>
	<?=$_POST['num1'] . $_POST['operator'] . $_POST['num2'] . "=" . $result?>
    </body>
</html>

<?php
    function calc ($num1,$num2,$operator) {
        if ($operator == "+") {
            return $num1 + $num2;
        }
        else {
            return $num1 - $num2;
        }
    }
?>