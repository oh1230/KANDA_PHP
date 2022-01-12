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
	   $number = array(1,3,5);
	   $ans1 = $number[0] + $number[1] + $number[2];
	   $ans2 = $number[0] * $number[1] * $number[2];

	   echo "{$number[0]} + {$number[1]} + {$number[2]} = ".$ans1."<br>\n";
	   echo "{$number[0]} ｘ {$number[1]} ｘ {$number[2]} = ".$ans2."<br>\n";
	?>
    </body>
</html>