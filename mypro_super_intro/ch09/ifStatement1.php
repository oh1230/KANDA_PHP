<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   $num1 = 8;
	   $num2 = 8;

	   echo '$num1 = ' , $num1 , '<br>';
	   echo '$num2 = ' , $num2 , '<br>';

	   //$num1と$num2の値を比較
	   if ($num1 == $num2) {
	       echo '◆変数$num1と$num2の値は等しいです。<br><br>';
	   }

	   //$num2の値を7に変更
	   $num2 = 7;

	   echo '$num1 = ' , $num1 , '<br>';
	   echo '$num2 = ' , $num2 , '<br>';

	   //$num1と$num2の値をもう一度比較
	   if ($num1 == $num2) {
	       echo '◆変数$num1と$num2の値は等しいです。<br><br>';
	   }
	?>
    </body>
</html>