<?php
    $message = "Hello\t";
    $count = 5;

    function echoMessageValues ($message, $count) {
        for ($i = 0; $i < $count; $i++) {
            echo $message;
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echoMessageValues($message, $count);
	?>
    </body>
</html>