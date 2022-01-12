<?php
    $num = $_GET['num']
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>conditionTest01_03</title>
	</head>
    <body>
	<?php
    	if ($num % 2 == 0) {
    	    print "「 $num 」は偶数です。";
    	}
    	else {
    	    print "「 $num 」は奇数です。";
    	}
	?>
    </body>
</html>