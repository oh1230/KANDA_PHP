<?php
/* プログラム名		：insertIniData.php
 * プログラム説明	：初期データファイルをDBへ登録する
 * 作成日時		：2010/04/21
 * 作成者		：神田ITスクール
*/
	//セッション利用
	session_start();
	
	//データベースプロセスファイルを読み込む
	require_once("dbprocess.php");
	
	//全検索SQL文の設定
	$sql = "SELECT * FROM bookinfo ORDER BY isbn";
	$result = executeQuery($sql);

	//結果セットの行数を取得する
	$rows = mysqli_num_rows($result);
	
	if($rows>0){
		$errMsg = "既にDBに書籍データが存在するため、初期登録は行えませんでした。";

		//書籍情報が取得出来ないのでエラーページへ遷移する
		header("Location: ./error.php?errMsg={$errMsg}");
		exit;		
	}else{
		//ファイルチェック
		if(!file_exists("./file/initial_data.csv")){
			$errMsg = "初期データファイルがないため、初期登録は行えませんでした。";
	
			//書籍情報が取得出来ないのでエラーページへ遷移する
			header("Location: ./error.php?errMsg={$errMsg}");
			exit;		
		}
		$fp = fopen("./file/initial_data.csv","r");
		while(!feof($fp)){
			$book=fgetcsv($fp);
			$booklist[]=$book;
			$sql="insert into bookinfo values('{$book[0]}','{$book[1]}',{$book[2]})";
			executeQuery($sql);
		}
		fclose($fp);
	}
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>InsertIniData</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="BLUE" width="950"></hr>
		<table width="950px" align="center">
			<tr>
				<td width="33%">[<a href="./menu.php">メニュー</a>]</td>
				<td width="33%" align="center"><font size="5">初期データ登録</font></td>
				<td width="34%" >
					<table align="right" >
						<tr>
							<td>名前：</td>
							<td><?=$_SESSION['userInfo']['user']?></td>
						</tr>
						<tr>
							<td>権限：</td>
							<td><?=($_SESSION['userInfo']['authority']==1?"一般ユーザー":"管理者")?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<hr align="center" size="2" color="black" width="950"></hr>
		<br/>
		<h2 align="center">初期データとして以下のデータを登録しました。</h2>
		<br/>
		<table align="center" border="0">
			<tr>
				<th bgcolor="#6666FF" width="200">ISBN</th>
				<th bgcolor="#6666FF" width="200">TITLE</th>
				<th bgcolor="#6666FF" width="200">価格</th>
			</tr>
			<?php
			foreach($booklist as $key=>$val){
			?>
			<tr>
				<td align="center"><?=$val[0]?></td>
				<td align="left">　<?=$val[1]?></td>
				<td align="center"><?=$val[2]?>円</td>
			</tr>
			<?php 		
			}
			?>
		</TABLE>
		<br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>