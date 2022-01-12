<?php
	header("Content-type: text/html; charset = UTF-8");

	//メール送信準備
	mb_language("japanese");
	mb_internal_encoding("UTF-8");
	$to= 'ohsangmin07@gmail.com'; //ご自分のアドレスを入れてください
	$sbj="test件名";
	$body = 'test本文';
	$hdr = "Content-Type: text/plain;charset=ISO-2022-JP";

	//メール送信
	$result = mb_send_mail($to, $sbj, $body, $hdr);

	//送信確認
	if ($result) {
		echo '送信完了';
	} else {
		echo '送信失敗';
	}
?>