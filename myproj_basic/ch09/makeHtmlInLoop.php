<?php
$tableData = array("PHP入門"=>2000,"PHP基礎"=>3980,"HTML"=>1500);
$checkData = array("当スクールのWebページ","口コミ","検索サイト","知人からの紹介");
$selectData = array("2009","2010","2011","2012");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
	①配列データをテーブルに表示<br>
	<table border="1">
		<tr>
			<th>タイトル</th>
			<th>価格</th>
		</tr>
		<?php foreach ($tableData as $title=>$price) {?>
		<tr>
			<td><?=$title?></td>
			<td><?=$price?></td>
		</tr>
		<?php }?>
	</table>
	<br>
	②配列データをチェックボックスで表示<br>
	<?php foreach ($checkData as $key=>$val) {?>
	<input type="checkbox" name="know[]" value="<?=$key?>"><?=$val?>
	<?php }?>
	<br><br>
	③配列データをセレクトボックスの項目に表示<br>
	<select name="year">
		<?php for ($i = 0; $i < count($selectData); $i++) {?>
			<option value="<?=$i?>"><?=$selectData[$i]?></option>
		<?php }?>
	</select>
    </body>
</html>