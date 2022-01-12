<?php
    /* プログラム名		：buyConfirm.php
     * プログラム説明	：購入確認画面
     * 作成日時			：2021/12/23
     * 作成者			：オ サン ミン
     */
    //セッションでIDと権限を確認
    session_start();
    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    //権限が無かった場合、ログオウトさせる
    if (!isset($id) || !isset($author)) {
        $errMsg = "セッション切れの為、購入処理は行えませんでした。 ";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }
    elseif (empty($_SESSION['cartInfo'])) {
        $errMsg="カートに書籍が入っていません。購入処理は行えませんでした。";
        $link = "list.php";
        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }
    else {
        //データベースプロセスファイルを読み込む
        require_once("dbprocess.php");

        //合計計算のための変数
        $total = 0;

        //メール本文
        $mail = "{$id}様\n\n";
        $mail .= "本のご購入ありがとうございました。\n";
        $mail .= "以下内容でご注文を受け付けましたので、ご連絡致します。\n\n";

        foreach($_SESSION['cartInfo'] as $key=>$val){
            $isbn = $val['isbn'];
            $title = $val['title'];
            $quantity = 1;
            $date = date("Y-m-d");

            $sql = "INSERT INTO orderinfo values(null,'{$id}','{$isbn}',{$quantity},'{$date}')";
            $result = executeQuery($sql);

            $mail .= $isbn . " " . $title . " " . $val['price'] . "円\n";

            $total += $val['price'];
        }

        $mail .= "合計金額 ".$total."円\n\n";
        $mail .= "またのご利用よろしくお願い致します。";

        //メール送信
        mb_language("japanese");
        mb_internal_encoding("UTF-8");
        $to = $_SESSION['mail'];
        $sbj = "本の購入連絡";
        $hdr = "Content-Type: text/plain;charset=ISO-2022-JP";
        mb_send_mail($to,$sbj,$mail,$hdr);
    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>BUY CONFIRM</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍販売システムWeb版 Ver.2.0</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>購入品確認</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">

		<br>
		<table align="center" style="width: 800; text-align: left">
			<tr>
				<td>
					<h2>
            			下記の商品を購入しました。<br>
            			ご利用ありがとうございました。
            		</h2>
				</td>
			</tr>
		</table>

		<table align="center" style="border: 0; width: 800">
			<tr >
				<th bgcolor="orange" width="267">ISBN</th>
				<th bgcolor="orange" width="267">TITLE</th>
				<th bgcolor="orange" width="266">価格</th>
			</tr>
			<?php
			if(!empty($_SESSION['cartInfo'])){
				foreach($_SESSION['cartInfo'] as $key=>$val){
			?>
			<tr>
				<td align="center"><?=$val["isbn"]?></a></td>
				<td align="center"><?=$val["title"]?></td>
				<td align="center"><?=$val["price"]?>円</td>
			</tr>
			<?php
			    $total += $row["price"];
			    }
			}
			?>
		</table>
		<br>
		<hr align="center" size="2" color="SILVER" width="800">
		<table align="center" style="width: 800">
			<tr>
				<td style="width: 200"></td>
				<td style="width: 200"></td>
				<td style="width: 200"></td>
				<td style="width: 200">
					<table>
						<tr>
							<th style="text-align: center; width: 100; background-color: orange">合計</th>
							<td style="text-align: center; width: 100; background-color: silver"><?=$total?>円</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>