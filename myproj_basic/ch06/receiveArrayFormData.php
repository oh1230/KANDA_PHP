<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<br>
	<?php
	   $personnal = $_POST['personal'];
	   $hobbys = $_POST['hobby'];

	   echo "{$personnal['name']}({$personnal['age']}歳)様、アンケートにご協力ありがとうございました。<br>\n";

	   echo "<br>■あなたの選んだ趣味<br>\n";

	   foreach ($hobbys as $val) {
	       echo "$val <br>\n";
	   }
	?>
    </body>
</html>