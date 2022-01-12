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

	   do {
	       echo $i."回目のdo-whileループです。<br>\n";
	       $i++;
	   } while ($i <= 3);
	   echo "------------------------------<br>\n";
	   echo "\$iは最終的に「 $i 」になって、ループ処理から抜けました。";
	?>
    </body>
</html>