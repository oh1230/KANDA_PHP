<?php
/* プログラム名		：dbprocess.php
 * プログラム説明	：DBへSQLを発行する関数を提供
 * 作成日時			：2010/04/21
 * 作成者			：神田ITスクール
*/
function executeQuery($sql)
{
    $url  = "localhost";
    $user = "root";
    $pass = "root123";
    $db   = "mybookdb";

    // MySQLへ接続する
    $link = @mysqli_connect($url, $user, $pass) or die("MySQLへの接続に失敗しました。>>");

    // データベースを選択する
    $sdb = @mysqli_select_db($link, $db) or die("データベースの選択に失敗しました。>>");

    // クエリを送信する
    $result = @mysqli_query($link, $sql) or die("クエリの送信に失敗しました。SQL:". $sql);

    // MySQLへの接続を閉じる
    @mysqli_close($link) or die("MySQL切断に失敗しました。>>");

    //戻り値
    return($result);
}
?>