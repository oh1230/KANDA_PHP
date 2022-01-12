<?php
    $favorite = $_POST['favorite'];

    if ($favorite == "野菜") {
        $msg = "あなたは繊細で優しく、穏やかかも知れません。";
    }
    elseif ($favorite == "魚") {
        $msg = "あなたは辛抱強く努力家で、冷静かも知れません。";
    }
    else {
        $msg = "あなたはパワフルで強く、積 極的かも知れません。";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<?=$msg?>
    </body>
</html>