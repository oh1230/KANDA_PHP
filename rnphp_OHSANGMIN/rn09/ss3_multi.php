<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<table border="2">
		<?php
		for ($i = 1; $i <= 9; $i++) {
		    print "<tr>\n";
		    for ($j = 1; $j <= 9; $j++) {
		        print "<td>" . ($i * $j) . "</td>";
		    }
		    print "</tr>\n";
		}
		?>
	</table>
    </body>
</html>