<?php
/*
 * プログラム名：BMI計算プログラムStep2
 * 作成者：オサンミン
 * 作成日：2021年12月6日
 */

    $height = $_POST['height'];
    $weight = $_POST['weight'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
    <?php
        //開始メッセージを出力する
        print "※※ＢＭＩ計算プログラムを開始します※※<br><br>";

        //身長と体重のメッセージを出力する
        print "身長： $height cm<br>";
        print "体重： $weight kg<br>";

        //終了メッセージを出力する
        print "<br>※※ＢＭＩ計算プログラムを終了します※※";
    ?>
    </body>
</html>