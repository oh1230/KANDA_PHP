<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $num = 0;

	   echo "▲「0 == \"\"」の比較結果<br>\n";
	   if ($num == "") {
	       echo "変数の中身はからっぽです。<br>\n";
	   } else {
	       echo "変数の中身は「".$num."」です。<br>\n";
	   }
	   echo "<br>\n";
	   echo "▼「0 === \"\"」の比較結果<br>\n";
	   if ($num === "") {
	       echo "変数の中身はからっぽです。<br>\n";
	   } else {
	       echo "変数の中身は「".$num."」です。<br>\n";
	   }
	?>
    </body>
</html>