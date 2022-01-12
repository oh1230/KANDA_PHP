<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $fp = fopen("sample.txt","r");

	   while (!feof ($fp)) {
	       echo fgets ($fp) . "<br>\n";
	   }

	   fclose($fp);
	?>
    </body>
</html>