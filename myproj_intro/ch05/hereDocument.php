<?php
    $name = "神田ハナコ";
    $height = 154.6;
    $age1 = 26;
    $age2 = 27;

    $output =<<<EOF
    {$name}さんの身長は{$height}cmです。<br>
        年齢は{$age1}歳です。<br>
        後１ヶ月で{$age2}になります。\n
EOF;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo $output;
	?>
    </body>
</html>