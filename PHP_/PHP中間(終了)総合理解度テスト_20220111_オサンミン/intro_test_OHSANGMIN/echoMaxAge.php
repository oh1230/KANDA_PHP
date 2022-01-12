<?php
    $age_list = array('A'=>23,'B'=>31,'C'=>18);
    $max_age = 0;

    foreach ($age_list as $key=>$val) {
        if ($val > $max_age) {
            $max_name = $key;
            $max_age = $val;
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		3名の中で最も年上なのは <?=$max_name?> さんで <?=$max_age?> 歳です。<br>
    </body>
</html>