<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $hobby = array("映画","読書","料理","卓球");

	   echo "私の趣味は";

	   foreach ($hobby as $val) {
	       echo "、".$val;
	   }

	   echo "などです。";
	?>
    </body>
</html>