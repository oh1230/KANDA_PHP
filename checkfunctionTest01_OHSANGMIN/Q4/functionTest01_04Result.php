<?php
    $num = $_POST['num'];

    function pow2($pow2Num) {
        $returnPow2 = $pow2Num * $pow2Num;
        return $returnPow2;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	$result = pow2($num);

	echo "$num の２乗は $result です。<br>\n";
	?>
    </body>
</html>