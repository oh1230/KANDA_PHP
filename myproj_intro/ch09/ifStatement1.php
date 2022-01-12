<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   $num1 = 10;
	   $num2 = 10;

	   echo "\$num1 = ".$num1."<br>\n";
	   echo "\$num2 = ".$num2."<br>\n";

	   //$num1と$num2の値を比較
	   if ($num1 == $num2) {
	       echo "◆変数\$num1と\$num2の値は等しいです。<br><br>\n";
	   }

	   //$num2の値を9に変更
	   $num2 = 9;

	   echo "\$num1 = ".$num1."<br>\n";
	   echo "\$num2 = ".$num2."<br>\n";

	   //$num1と$num2の値をもう一度比較
	   if ($num1 == $num2) {
	       echo "●変数\$num1と\$num2の値は等しいです。<br><br>\n";
	   }
	?>
    </body>
</html>