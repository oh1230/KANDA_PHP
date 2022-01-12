<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $value1 = 100;
	   $value2 = 200;
	   $value3 = $value1 + $value2;
	   $value3 += $value2;
	   $value3++;
	   echo "計算結果は、".$value3."です。";
	?>
    </body>
</html>