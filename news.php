<?php
mysql_connect('localhost','root','rudranil');
mysql_select_db('today_news');

/*session_start();
if(!isset($_SESSION['mail']))
{
  header('location:login.php?msg=unauthorized');
}
else{
$show_mail=$_SESSION['mail'];
$user_id=$_SESSION['id'];
if(isset($show_mail)){
$userin= "welcome " .$show_mail;
//echo $userin;
//echo $user_id;
}
else {
  echo "problem in session";
}
}*/
$news_id=$_GET['newsID'];
if(isset($_POST['liked'])){

	$postid=$_POST['postid'];
	$email=$_POST['email'];
	$result=mysql_query("select * from posts where id=$postid");
	$row=mysql_fetch_array($result);
	$n=$row['likes'];
	mysql_query("update posts set likes=$n+1 where id=$postid");
	mysql_query("insert into likes(email, postid) values('$email',$postid)");
	exit();
}
if(isset($_POST['unliked'])){

	$postid=$_POST['postid'];
	$email=$_POST['email'];
	$result=mysql_query("select * from posts where id=$postid");
	$row=mysql_fetch_array($result);
	$n=$row['likes'];
	mysql_query("update posts set likes=$n-1 where id=$postid");
	mysql_query("delete from likes where postid=$postid and email='$email'");
	exit();
}
?>
<style type="text/css">
		.content{
			width: 90%;
			margin: 100px auto;
			border:1px solid black;
		}
		.date{
			float:right;
			padding-right: 50px;
		}
		.like{
				padding-left: 60px;

		}
		.unlike{
				padding-left: 60px;
		}
		.lh{

			padding-left: 50px;
			padding-right:50px;
		}
		.post img{
			
		}
		
	</style>
<!DOCTYPE html>
<html>
<body>
    <center><h2><font color="blue">Daily News</font></h2></center>
	<div class="content">
	<?php
		$query=mysql_query("select * from posts where id=$news_id");

		while($row = mysql_fetch_array($query))
		{?>
			<div class="post">
				<h3><?php echo $row['title']; ?></h3><br><hr>
				<div class="date"><?php echo $row['pubdate'];?></div><br>
			 	<?php $text=$row['description'];?><br>
			 	<?php
			 	$text=str_replace("table", "div", $text);
			 	$text=str_replace("/table", "/div", $text);	
			    echo preg_replace( '/style=(["\'])[^\1]*?\1/i', '', $text, -1 );?><br>
				</div>
			 <?php
			 	$email=$_GET['email'];
			 	$result= mysql_query("select * from likes where email='$email' and postid=".$row['id']."");
			 	if(mysql_num_rows($result)==1){?>
				<span><a href="" class="unlike" id="<?php echo $row['id']; ?>" name="<?php echo $_GET['email']; ?>">unlike</a></span>
				<?php } else {?>
					<span><a href="" class="like" id="<?php echo $row['id'];?>" name="<?php echo $_GET['email'];?>">like</a></span>
					<?php }?>
					<hr>

		<?php }?>

	</div>
	<!--Add Jquery-->
	<script type="text/javascript" src="jquery-3.2.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.like').click(function(){
				var postid=$(this).attr('id');
				var email=$(this).attr('name');
				$.ajax({
						url:'news.php',
						type:'post',
						async:false,
						data:{
							'liked':1,
							'postid':postid,
							'email':email
						},
						success:function(){

						}
					});
				});
				$('.unlike').click(function(){
				var postid=$(this).attr('id');
				var email=$(this).attr('name');
				$.ajax({
						url:'news.php',
						type:'post',
						async:false,
						data:{
							'unliked':1,
							'postid':postid,
							 'email':email

						},
						success:function(){

						}
					});
				});
			});
	</script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>