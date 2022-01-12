<?php
    $age = $_GET['age']
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>conditionTest01_05</title>
	</head>
    <body>
	<?php
    	if ($age <= 3) {
    	    print "$age 才は無料です。";
    	}
    	elseif ($age <= 11) {
    	    print "$age 才は子ども料金（4,800円）です。";
    	}
    	elseif ($age <= 17) {
    	    print "$age 才は学生料金（6,400円）です。";
    	}
    	else {
    	    print "$age 才は大人料金（7,400円）です。";
    	}
	?>
    </body>
</html>