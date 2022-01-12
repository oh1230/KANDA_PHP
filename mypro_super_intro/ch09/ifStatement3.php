<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   $num1 = 9;
	   $num2 = 3;

	   $operator = "*";
	   //$operator = "/";
	   //$operator = "%";

	   //変数$operatorを判定し条件に応じた処理を行う
	   if ($operator == "*") {
	       //掛け算結果を表示
	       echo $num1 , $operator , $num2 , ' = ' , $num1*$num2 ;
	   }
	   elseif ($operator == "/") {
	       //割り算結果を表示
	       echo $num1 , $operator , $num2 , ' = ' , $num1/$num2 ;
	   }
	   else {
	       echo "掛け算と割り算以外の計算は行えません。";
	   }
	?>
    </body>
</html>