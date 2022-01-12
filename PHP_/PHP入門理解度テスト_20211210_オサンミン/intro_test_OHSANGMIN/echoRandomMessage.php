<?php
    $n = mt_rand(1,5);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	if ($n == 5) {
    	    echo "「 $n 」が出た！大当たり！！！<br>\n";
    	}
    	elseif ($n == 4) {
    	    echo "「 $n 」が出た！当たり！！！<br>\n";
    	}
    	else {
    	    echo "「 $n 」が出た！また来てね！<br>\n";
    	}
	?>
    </body>
</html>