<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $fp = fopen("subject_data.csv", "r");

	   var_dump(fgets($fp));
	   echo "<br>\n";
	   var_dump(fgetcsv($fp));

	   fclose($fp);
	?>
    </body>
</html>