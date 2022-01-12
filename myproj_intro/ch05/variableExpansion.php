<?php
    //年齢の変数
    $age = 26;

    $output1 = '私の年齢は{$age}歳です。<br>';
    $output2 = "私の年齢は{$age}歳です。<br>";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   echo $output1;
	   echo $output2;
	?>
    </body>
</html>