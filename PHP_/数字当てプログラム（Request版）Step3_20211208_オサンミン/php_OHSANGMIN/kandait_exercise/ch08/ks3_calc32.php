<?php
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo $_POST['num1']," + ",$_POST['num2']," = ",$_POST['num1']+$_POST['num2'];
	?>
    </body>
</html>