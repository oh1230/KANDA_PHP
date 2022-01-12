<?php
    $array = array(1,3,5,7,9,11,13,15);

    function countThreeTimes ($array) {
        $count = 0;
        for ($i = 0; $i < count($array); $i++) {
            $num = $array[$i];
            if ($num % 3 == 0) {
                printThreeTimesElement($i, $num);
                $count++;
            }
        }

        return $count;
    }

    function printThreeTimesElement ($index, $num) {
        echo "配列番号 {$index} 番目の値 {$num} は 3 の倍数です。<br>";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<?php
		$count = countThreeTimes($array);
		?>
		<br>
		配列内にある 3 の倍数は合計で <?=$count?> 個です。<br>
    </body>
</html>