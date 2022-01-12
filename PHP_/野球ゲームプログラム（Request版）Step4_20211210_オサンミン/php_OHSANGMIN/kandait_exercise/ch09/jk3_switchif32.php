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
	if ($_POST["operater"] == "+") {
	    $ans = $_POST["num1"] + $_POST["num2"];
	} else if ($_POST["operater"] == "-") {
	    $ans = $_POST["num1"] - $_POST["num2"];
	} else if ($_POST["operater"] == "×") {
	    $ans = $_POST["num1"] * $_POST["num2"];
	} else if ($_POST["operater"] == "÷") {
	    $ans = $_POST["num1"] / $_POST["num2"];
	}

	print $_POST["num1"].$_POST["operater"].$_POST["num2"]."=".$ans;
	?>
    </body>
</html>