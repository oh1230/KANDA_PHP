<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $total = 0;

	   for ($i = 1; $i <= 5; $i++) {
	       echo "\$i = ".$i."<br>\n";
	       $total += $i;
	   }
	   echo $i."未満の数値の総計は".$total."です。";
	?>
    </body>
</html>