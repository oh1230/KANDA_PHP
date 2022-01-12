<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	for ($i = 1; $i <= 100; $i++) {
	    if ($i % 3 == 0) {
	        echo 'Fizz';
	    }
	    elseif ($i % 5 == 0) {
	        echo 'Buzz';
	    }
	    else {
	        echo $i;
	    }
	    echo " ";
	}
	?>
    </body>
</html>