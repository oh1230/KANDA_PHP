<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $num = mt_rand(1,10);

	   if ($num == 10) {
	       echo "■九九表<br>\n";
	   }
	   else {
	       echo "■九九表( $num の段の1つ前まで表示します。)<br>\n";
	   }

	   for ($i = 1; $i <= 9; $i++) {
	       echo "$i の段：";
	       for ($j = 1; $j <= 9; $j++) {
	           if ($i == $num) {
	               echo "この段を表示せずに、外側のループを抜けました。";
	               break 2;
	           }
	           echo $i*$j."";
	       }
	       echo "<br>\n";
	   }
	?>
    </body>
</html>