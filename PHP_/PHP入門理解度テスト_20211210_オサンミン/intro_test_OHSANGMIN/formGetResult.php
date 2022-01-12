<?php
    $name = $_GET['name'];
    $age = $_GET['age'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo "$name さんは $age 才なんですね。<br>\n";
	?>
    </body>
</html>