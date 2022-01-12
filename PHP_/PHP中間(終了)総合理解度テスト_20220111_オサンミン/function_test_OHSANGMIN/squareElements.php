<?php
    $array = array(1,2,3,4,5,6,7);

    function squareElements ($array) {

        for ($i = 0; $i < count($array); $i++) {
            $array[$i] *= $array[$i];
        }

        return $array;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<?php
		  $array = squareElements($array);

		  foreach ($array as $val) {
		      echo "{$val}\t";
		  }
		?>
    </body>
</html>