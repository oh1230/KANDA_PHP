<?php
    $num = 3;

    function printSquareAsterisk ($num) {
        for ($i = 0; $i < ($num * $num); $i++) {
            echo "*";
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<?php printSquareAsterisk($num)?>
    </body>
</html>