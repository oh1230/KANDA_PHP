<?php
    $count = $_POST['count'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	for ($i = 0; $i < $count; $i++) {
    	    echo "■";
    	}
	?>
    </body>
</html>