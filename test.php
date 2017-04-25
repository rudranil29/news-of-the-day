<?php
mysql_connect('localhost','root','rudranil');
mysql_select_db('today_news');

$news_sql="select * from posts";
$news_query=mysql_query($news_sql);
$rsnews=mysql_fetch_assoc($news_query);
echo $rsnews['title'];

?>