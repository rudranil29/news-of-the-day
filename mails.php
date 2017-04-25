<?php
require 'mail.php';
mysql_connect('localhost','root','rudranil');
mysql_select_db('today_news');

$news_sql="select id,title from posts";
$news_query=mysql_query($news_sql);
$news="";
$mailid="";
$user_sql="select * from users;";
$user_query=mysql_query($user_sql);
$useremail="";

?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php

				while($users = mysql_fetch_assoc($user_query)) 
				{

					mysql_data_seek($news_query, 0);
					while($rsnews=mysql_fetch_assoc($news_query))
					{
					 $news.= '<p><a href="http://localhost/mail/news.php?newsID=' . $rsnews['id'] .'&email='. $users['email'] .'">' . $rsnews['title'] . '</a><p>';
					}
					$mail->Subject = 'news';
					$mail->Body    = $news;
					//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
					$mail->addAddress($users['email']);       
					$mail->isHTML(true);                               

					if(!$mail->send()) {
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
					    echo 'Message has been sent'.$users['email'].'<br>';
					}
					$news="";
					$mail->clearAddresses();
				}

		?>
		
	</body>
</html>	