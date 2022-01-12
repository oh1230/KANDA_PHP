<?php
    $kuku = array(1,2,3,4,5,6,7,8,9);

    function kuku ($kuku) {

        $count = 1;

        foreach ($kuku as $val1) {
            echo "{$count} の段：";
            foreach ($kuku as $val2) {
                $multi = $val1 * $val2;
                echo "\t{$multi}\t";
            }
            echo "<br>";
            $count++;
        }
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<?php kuku($kuku)?>
    </body>
</html>