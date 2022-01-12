<?php
    $month = mt_rand(1,12);

    function getSeason ($month) {

        switch ($month) {
            case 1:
            case 2:
            case 12:
                $season = "冬";
                break;
            case 3:
            case 4:
            case 5:
                $season = "春";
                break;
            case 6:
            case 7:
            case 8:
                $season = "夏";
                break;
            case 9:
            case 10:
            case 11:
                $season = "秋";
                break;
        }

        return $season;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
    	<?php $season = getSeason($month)?>

		<?=$month?> 月の季節は「<?=$season?>」です。<br>
    </body>
</html>