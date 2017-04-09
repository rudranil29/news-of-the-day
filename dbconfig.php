<?php
 $db = mysql_connect('localhost','root','rudranil');
 mysql_select_db('news_feeds',$db);
 if (!$db) {
    die("Connection failed: " . mysql_error());
}
?>
