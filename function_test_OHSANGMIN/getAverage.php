<?php
    function getAverage ($data) {
        $total = 0;
        for ($i = 0; $i < count($data); $i++) {
            $total += $data[$i];
        }
        $average = $total / count($data);

        return $average;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $data = array(7,8,9,10,11,12);

	   $average = getAverage($data);

	   echo "平均値は $average です。<br>\n";
	?>
    </body>
</html>