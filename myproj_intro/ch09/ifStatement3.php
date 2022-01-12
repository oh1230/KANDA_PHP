<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   $num1 = 15;
	   $num2 = 10;

	   $operator = "+";
	   //$operator = "-";
	   //$operator = "*";

	   //変数$operatorを判定し条件に応じた処理を行う
	   if ($operator == "+") {
	       //掛け算結果を表示
	       echo "{$num1} {$operator} {$num2} = ".($num1 + $num2);
	   }
	   elseif ($operator == "-") {
	       //割り算結果を表示
	       echo "{$num1} {$operator} {$num2} = ".($num1 - $num2);
	   }
	   else {
	       echo "足し算と引き算以外の計算は行えません。";
	   }
	?>
    </body>
</html>