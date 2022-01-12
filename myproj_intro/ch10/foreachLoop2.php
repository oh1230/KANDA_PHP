<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $data = array('国語' => 69, '数学' => 95, '料理' => 92, '社会' => 32, '英語' => 56);

	   foreach ($data as $key => $val){
	       echo $key."：".$val."点<br>\n";
	       $total += $val;
	   }

	   $avarage = $total / 5;

	   echo "５教科の合計は「".$total."」点です。<br>\n";
	   echo "５教科の平均は「".$avarage."」点です。<br>\n";
	?>
    </body>
</html>