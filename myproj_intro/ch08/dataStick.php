<?php
    $hobby = "プログラミング";
    $year = 1;

    $str = "経験年数は「".$year."」年になりました。\n";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo "私の趣味は「".$hobby."」です。<br>\n";
	   echo $str;
	?>
    </body>
</html>