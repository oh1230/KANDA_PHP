<?php
    $favor = $_POST['favor'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	if ($favor == "野菜") {
    	    echo "あなたは繊細で優しく、穏やかかも知れません。";
    	}
    	elseif ($favor == "魚") {
    	    echo "あなたは辛抱強く努力家で、冷静かも知れません。";
    	}
    	elseif ($favor == "肉") {
    	    echo "あなたはパワフルで強く、積極的かも知れません。";
    	}
	?>
    </body>
</html>