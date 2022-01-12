<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	for ($i = 1; $i <= 5; $i++) {
	    for ($j = 1; $j <= $i; $j++) {
	        print "▲";
	    }
	    print "<br>\n";
	}
	?>
    </body>
</html>