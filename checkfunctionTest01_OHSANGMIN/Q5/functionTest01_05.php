<?php
    $pointArray = array(10,20,30);

    function arrayTotal($pointArray) {
        $total = 0;
        foreach ($pointArray as $val) {
            $total += $val;
        }
        echo "合計値は $total です。<br>\n";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   arrayTotal($pointArray);
	?>
    </body>
</html>