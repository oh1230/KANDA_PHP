<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $readfp = fopen ("subject_data.csv","r");

	   while (!feof($readfp)) {
	       $data = fgetcsv($readfp);

	       $subjects[] = $data[0];
	       $scores[] = $data[1];

	       $total += $data[1];
	   }

	   fclose ($readfp);
	   echo "ファイルの読み込みが成功しました。<br>\n";

	   $writefp = fopen("statistics.txt", "w");

	   for ($i = 0; $i < count($subjects); $i++) {
	       fputs ($writefp, $subjects[$i] . "<--->" . $scores[$i] . "\n");
	   }

	   fputs ($writefp, "合計点：" . $total . "\n");

	   fputs ($writefp, "平均点：" . ($total/count($scores)) . "\n");

	   fclose ($writefp);

	   echo "ファイルの書き込みが成功しました。<br>\n";
	?>
    </body>
</html>