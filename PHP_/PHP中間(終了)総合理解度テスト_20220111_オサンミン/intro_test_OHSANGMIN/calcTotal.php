<?php
    $total = 0;
    $num = array(3,8,1,12,5);

    foreach ($num as $val) {
        $total += $val;
    }

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		合計は <?=$total?> です。<br>
    </body>
</html>