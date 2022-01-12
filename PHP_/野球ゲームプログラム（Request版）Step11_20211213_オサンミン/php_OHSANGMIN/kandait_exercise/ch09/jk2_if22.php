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
        $month = $_POST["month"];


        if ($month >= 3 && $month <= 5) {
            $season = "春";
        } else if ($month >= 6 && $month <= 8) {
            $season = "夏";
        } else if ($month >= 9 && $month <= 11) {
            $season = "秋";
        } else if ($month >= 12 || ($month >= 1 && $month <= 2)) {
            $season = "冬";
        }

        echo "季節は".$season."です。";
	?>
    </body>
</html>