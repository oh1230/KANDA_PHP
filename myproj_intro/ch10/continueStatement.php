<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	for ($i = 0; $i < 10; $i++) {
    	    if (($i % 2) == 0) {
    	        continue;
    	    }
    	    echo $i."は奇数です。<br>\n";
    	}
    	echo '繰り返しは「$i = '.$i.'」まで行いました。';
	?>
    </body>
</html>