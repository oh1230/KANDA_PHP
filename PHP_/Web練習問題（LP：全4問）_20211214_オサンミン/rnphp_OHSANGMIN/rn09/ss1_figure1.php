<?php
header('Content-type: text/html; charset=UTF-8');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $ch = 0;

	   for ($i = 0; $i < 5; $i++) {
	       for ($j = 0; $j < 5; $j++) {
	           if ($ch == 0) {
	               print "●";
	               $ch = 1;
	           }
	           else {
	               print "▲";
	               $ch = 0;
	           }
	       }
	       print "<br/>\n";
	   }
	?>
    </body>
</html>