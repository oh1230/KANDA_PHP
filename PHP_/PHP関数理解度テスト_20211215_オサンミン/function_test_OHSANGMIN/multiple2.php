<?php
    function multiple2 ($data) {

        for ($i = 0; $i < count($data); $i++) {
            $data[$i] = $data[$i] * 2;
        }

        return $data;
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

	   $data = multiple2($data);

	   echo "戻り値として受け取った配列の要素は ";
	   for ($i = 0; $i < count($data); $i++) {
	       echo $data[$i];
	       if ($i == count($data) - 1) {
	           echo " ";
	       } else {
	           echo ", ";
	       }
	   }
	   echo "です。<br>\n";
	?>
    </body>
</html>