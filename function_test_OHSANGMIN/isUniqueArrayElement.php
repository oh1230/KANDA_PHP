<?php
    $array1 = array(12,24,8,15);
    $array2 = array(14,25,11);

    function isUniqueArrayElement ($array1, $array2) {
        $result = true;
        foreach ($array1 as $val1) {
            foreach ($array2 as $val2) {
                if ($val1 == $val2) {
                    $result = FALSE;
                }
            }
        }
        return $result;
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
    	--- 配列 array1 と配列 array2 を比較 ---<br>
    	<br>

		<?php
		  $result = isUniqueArrayElement($array1, $array2);

		  if ($result) {
		      echo "全てユニークな値になっています。";
		  }
		  else {
		      echo "重複した値が含まれています！";
		  }
		?>
    </body>
</html>