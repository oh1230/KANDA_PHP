<?php
    $num = $_GET['num']
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>conditionTest01_02</title>
	</head>
    <body>
	<?php
    	if ($num == 5) {
    	    print "入力された数値は「５」です。";
    	}
    	else {
    	    print "入力された数値は「５」ではありません。";
    	}
	?>
    </body>
</html>