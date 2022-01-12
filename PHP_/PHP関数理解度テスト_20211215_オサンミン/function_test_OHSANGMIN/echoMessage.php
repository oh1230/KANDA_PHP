<?php
    $message = "Hello World";

    function echoMessage ($message) {
        echo $message;
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echoMessage($message);
	?>
    </body>
</html>