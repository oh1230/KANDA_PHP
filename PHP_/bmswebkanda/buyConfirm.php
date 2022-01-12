<?php
/* プログラム名		：buyConfirm.php
 * プログラム説明	：書籍の購入処理を行う
 * 作成日時		：2010/04/21
 * 作成者		：神田ITスクール
*/
	//セッション利用
	session_start();
	
	//データベースプロセスファイルを読み込む
	require_once("dbprocess.php");
	
	if(!isset($_SESSION['cartInfo'])){
		$errMsg="セッション切れの為、購入処理は行えませんでした。";
		header("Location: ./error.php?errMsg={$errMsg}&path=logout");
		exit;
	}elseif(empty($_SESSION['cartInfo'])){
		$errMsg="カートの中身がない為、購入処理は行えませんでした。";
		header("Location: ./error.php?errMsg={$errMsg}&path=list");
		exit;
	}else{
		$total=0;
		$user=$_SESSION['userInfo']['user'];
		
		$body  = $user."様\n\n";
		$body .= "本のご購入ありがとうございました。\n";
		$body .= "以下内容でご注文を受け付けましたので、ご連絡致します。\n\n";
		
		foreach($_SESSION['cartInfo'] as $key=>$val){
			$isbn=$val['isbn'];
			$quantity=1;
			$date=date('Y-m-d');
			
			//dbprocessファイルから「executeQuery」関数を利用してSQLを発行する
			$sql="INSERT INTO orderinfo values(null,'{$user}','{$isbn}','{$quantity}','{$date}')";
			$result = executeQuery($sql);
			
			//メール本文の作成
			$body .= $val['isbn']." ".$val['title']." ".$val['price']."円\n";
			
			//合計金額を求める
			$total += $val['price'];
		}
		$body .= "合計金額 ".$total."円\n\n";
		$body .= "またのご利用よろしくお願い致します。";

		//メール送信
		mb_language("japanese");
		mb_internal_encoding("UTF-8");
		$to=$_SESSION['userInfo']['email'];
		$sbj="本の購入連絡";
		$hdr = "Content-Type: text/plain;charset=ISO-2022-JP";
		mb_send_mail($to,$sbj,$body,$hdr);
		
	}
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>BuyConfirm</title>
	</head>
	<body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="BLUE" width="950"></hr>
		<table width="950px" align="center">
			<tr>
				<td width="33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td width="33%" align="center"><font size="5">カート内容</font></td>
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
		<br/><br/>
		<table align="center" border="0" style="border-bottom: double">
			<tr>
				<th bgcolor="#6666FF" width="200">ISBN</th>
				<th bgcolor="#6666FF" width="200">TITLE</th>
				<th bgcolor="#6666FF" width="200">価格</th>
			</tr>
			<?php
			
			if(!empty($_SESSION['cartInfo'])){
				foreach($_SESSION['cartInfo'] as $key=>$val){
					
			?>
			<tr>
				<td align="center"><?=$val['isbn']?></td>
				<td align="left">　<?=$val['title']?></td>
				<td align="center"><?=$val['price']?>円</td>
			</tr>
			<?php 		
				}
			}else{
			?>
			<tr>
				<td colspan="4" align="center">
				<br>カートの中身はありません。<br><br>
				</td>
			</tr>	
			<?php 	
			}
			//カート情報を破棄
			unset($_SESSION['cartInfo']);
			?>
		</TABLE>
		<br>
		<table align="center" border="0">
		<tr>
		<td width="50px" bgcolor="#6666FF" align="center" >合計</td>
		<td width="100px" align="center"><?=$total?>円</td>
		</tr>
		</table>
		<br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>