<?php
    $nums = array(0,1,3,5,7,9);
    $num = 3;

    $nums[0] += $num;
    $nums[1] -= $num;
    $nums[2] *= $num;
    $nums[3] /= $num;
    $nums[4] %= $num;
    $nums[5] .= $num;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo "配列初期値 → 計算後の配列の各値<br>\n";
	   echo "\$nums[0] = 0 → ".$nums[0]."<br>\n";
	   echo "\$nums[1] = 1 → ".$nums[1]."<br>\n";
	   echo "\$nums[2] = 3 → ".$nums[2]."<br>\n";
	   echo "\$nums[3] = 5 → ".$nums[3]."<br>\n";
	   echo "\$nums[4] = 7 → ".$nums[4]."<br>\n";
	   echo "\$nums[5] = 9 → ".$nums[5]."<br>\n";
	?>
    </body>
</html>