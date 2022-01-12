<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
    	if (!is_readable("subject_data.csv")) {
    	    echo "「subject_data.csv」が読み込めないため処理を中断します。";
    	    exit;
    	}

    	$readfp = fopen("subject_data.csv","r");

    	while (!feof($readfp)) {
    	    $data = fgetcsv($readfp);

    	    $subjects[] = $data[0];
    	    $scores[] = $data[1];

    	    $total += $data[1];
    	}

    	fclose($readfp);

    	echo "ファイルの読み込みが成功しました。<br>\n";

    	if (file_exists("statistics.txt")) {
    	    if (!is_writable("statistics.txt")) {
    	        echo "「statistics.txt」が書き込み禁止のため処理を中断します。";
    	        exit;
    	    }
    	}

    	$writefp = fopen("statistics.txt", "w");

    	for ($i = 0; $i < count($subjects); $i++) {
    	    fputs ($writefp,$subjects[$i] . "<--->" . $scores[$i] . "\n");
    	}

    	fputs ($writefp, "合計点：" . $total . "\n");

    	fputs ($writefp, "平均点：" . ($total / count($scores)) . "\n");

    	fclose($writefp);

    	echo "ファイルの書き込みが成功しました。<br>\n";
	?>
    </body>
</html>