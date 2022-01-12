<?php
    function getWeatherForecast () {
        $array = array("晴れ","曇り","雨","雪");

        $randomWeather = $array[mt_rand(0,3)];

        return "今日の天気は、 $randomWeather でしょう。<br>\n";
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	<?php
	   $today = getWeatherForecast();
	   echo $today;
	?>
    </body>
</html>