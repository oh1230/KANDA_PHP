<?php
    $array1 = array('H','e','l','l','o');
    $array2 = array('W','o','r','l','d');

    function mergeArray ($array1, $array2) {
        $mergeArray = array_merge($array1,$array2);

        return $mergeArray;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<?php
		  $mergeArray = mergeArray($array1, $array2);

		  foreach ($mergeArray as $val) {
		      echo "{$val}\t";
		  }
		?>
    </body>
</html>