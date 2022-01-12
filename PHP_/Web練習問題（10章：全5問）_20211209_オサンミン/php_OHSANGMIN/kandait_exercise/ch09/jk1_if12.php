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
    	if ($_POST['age'] >= 20) {
    	    echo "あなたは成年です。";
    	} else {
    	    echo "あなたは未成年です。";
    	}
	?>
    </body>
</html>