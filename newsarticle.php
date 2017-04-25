<?php
mysql_connect('localhost','root','rudranil');
mysql_select_db('today_news');
if(isset($_GET['newsID']))
{
	$newsid=$_GET['newsID'];
	$email=$_GET['email'];
	echo $email;
	$news_sql="select * from posts where id=$newsid";
$news_query=mysql_query($news_sql);
$rsnews=mysql_fetch_assoc($news_query);

}
else
{
	echo 'SORRY NO NEWS IS SELECTED';
}
?>
<!DOCTYPE html>
<html>
	<head>

	</head>
<body>
<h1><?php echo $rsnews['title'];?></h1>
<p><?php echo $rsnews['pubdate'];?></p>
<p><?php echo $rsnews['description'];?></p>
</body>
</html>