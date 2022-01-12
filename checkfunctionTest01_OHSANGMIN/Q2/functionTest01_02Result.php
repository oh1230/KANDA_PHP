<?php
    $age = $_POST['age'];

    function printAge($age) {
        if ($age < 20) {
            echo "$age 才は未成年です。<br>\n";
        }
        else {
            echo "$age 才は成人です。<br>\n";
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php printAge($age) ?>
    </body>
</html>