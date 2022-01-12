<?php
    //配列変数に3つの値を用意
    $nums = array(1,2,3);

    //配列の要素を3つ全て足す
    $ans = $nums[0] + $nums[1] + $nums[2];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   echo "{$nums[0]} + {$nums[1]} + {$nums[2]} = {$ans}\n";
	?>
    </body>
</html>