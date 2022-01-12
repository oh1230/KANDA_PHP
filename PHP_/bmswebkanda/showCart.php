<?php
/* プログラム名		：showCart.php
 * プログラム説明	：カート内容を全て表示する。
 * 作成日時		：2010/04/21
 * 作成者		：神田ITスクール
*/
	//セッション利用
	session_start();
	
	//削除リンクの場合
	if(isset($_GET['delno'])){
		//指定の削除番号のデータを削除する
		unset($_SESSION['cartInfo'][$_GET['delno']]);
	}
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>ShowCart</title>
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
				<th bgcolor="#6666FF" width="250">&nbsp;</th>
			</tr>
			<?php
			$total=0;
			if(!empty($_SESSION['cartInfo'])){
				foreach($_SESSION['cartInfo'] as $key=>$val){
					$total += $val['price'];
			?>
			<tr>
				<td align="center"><?=$val['isbn']?></td>
				<td align="left">　<?=$val['title']?></td>
				<td align="center"><?=$val['price']?>円</td>
				<td align="center"><a href="./showCart.php?delno=<?=$key?>">削除</a></td>
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
			?>
		</TABLE>
		<br>
		<table align="center" border="0">
		<tr>
		<td width="50px" bgcolor="#6666FF" align="center" >合計</td>
		<td width="100px" align="center"><?=$total?>円</td>
		</tr>
		</table>
		<table align="center" border="0">
			<tr>
				<td width="800px" align="right">
					<form action="buyConfirm.php">
						<input type="submit" value="購入" <?php //($total==0)?"disabled":""?>>
					</form>
				</td>
			</tr>
		</table>
		<br><br><br><br><br><br><br>
		<hr align="center" size="5" color="blue" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2010 all rights reserved.</td></tr>
		</table>
	</body>
</html>