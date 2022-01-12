<?php
    $i = 15;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo "変数「i」の値は「 $i 」<br>\n";

	   for ($cnt = 1; $cnt <= $i; $cnt++) {
	       if ($cnt % 5 == 0) {
	           echo "$cnt<br>\n";
	       }
	   }
	?>
    </body>
</html>