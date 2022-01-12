<?php
    $num = array(3,8,1,12,5);

    $total = 0;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	for ($i = 0; $i < count($num); $i++) {
    	    $total += $num[$i];
    	}

    	echo "合計は $total です。<br>\n";
	?>
    </body>
</html>