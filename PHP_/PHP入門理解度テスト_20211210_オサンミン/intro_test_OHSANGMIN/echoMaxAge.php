<?php
    $age_list = array('A' => 23, 'B' => 31, 'C' => 18);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	    $max_age = max($age_list);

	    if ($age_list['A'] > $age_list['B']) {
	        $max_name = "A";
	    }
	    else {
	        $max_name = "B";
	    }
	    if ($age_list["$max_name"] < $age_list['C']) {
	        $max_name = "C";
	    }

        echo "3名の中で最も年上なのは $max_name さんで $max_age 歳です。<br>\n";
	?>
    </body>
</html>