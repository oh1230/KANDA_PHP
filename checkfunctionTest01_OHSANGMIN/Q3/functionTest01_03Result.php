<?php
    function inputAge() {
        $age = $_POST['age'];
        return $age;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	$returnAge = inputAge();

	if ($returnAge < 20) {
	    echo "$returnAge 才は未成年です。<br>\n";
	}
	else {
	    echo "$returnAge 才は成人です。<br>\n";
	}
	?>
    </body>
</html>