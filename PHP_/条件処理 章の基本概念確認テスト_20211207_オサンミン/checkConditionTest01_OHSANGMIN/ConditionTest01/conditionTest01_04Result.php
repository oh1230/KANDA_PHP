<?php
    $num = $_GET['num']
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>conditionTest01_04</title>
	</head>
    <body>
	<?php
    	if ($num > 0) {
    	    print "「 $num 」は正の数です。";
    	}
    	elseif ($num < 0) {
    	    print "「 $num 」は負の数です。";
    	}
    	else {
    	    print "「 $num 」はどちらでもありません。";
    	}
	?>
    </body>
</html>