<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	for ($i = 0; $i < 50; $i++) {
    	    echo '$i = '.$i."<br>\n";

    	    if ($i == 5) {
    	        break;
    	    }
    	}
    	echo '繰り返しは「$i = '.$i.'」まで行いました。';
	?>
    </body>
</html>