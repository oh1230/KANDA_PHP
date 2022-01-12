<?php
    $score = array('国語' => 95, '数学' => 64, '英語' => 80, '理科' => 59, '社会' => 76);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	foreach ($score as  $key => $val) {
    	    echo "$key の点数： $val  点<br>\n";
    	    $total += $val;
    	}
    	echo "<br><br>合計： $total 点";
	?>
    </body>
</html>