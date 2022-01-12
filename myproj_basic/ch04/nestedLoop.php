<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	for ($i = 1; $i <= 2; $i++) {
    	    echo "■外側のループ $i 回目<br>\n";
            for ($j = 1; $j <= 3; $j++) {
    	       echo "●内側のループ $j 回目<br>\n";
    	    }
    	    echo "<br>\n";
    	}
	?>
    </body>
</html>