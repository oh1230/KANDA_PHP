<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $i = 1;

	   while ($i <= 3) {
	       echo $i."回目のwhileループです。<br>\n";
	       $i++;
	   }

	   echo "------------------------------<br>\n";
	   echo "\$iは最終的に「 $i 」になって、ループ処理から抜けました。";
	?>
    </body>
</html>