<?php
mysql_connect('localhost','root','');
mysql_select_db('like');

if(isset($_POST['liked'])){

	$postid=$_POST['postid'];
	$result=mysql_query("select * from posts where id=$postid");
	$row=mysql_fetch_array($result);
	$n=$row['likes'];

	mysql_query("update posts set likes=$n+1 where id=$postid");
	mysql_query("insert into likes(userid, postid) values(1,$postid)");
	exit();
}
if(isset($_POST['unliked'])){

	$postid=$_POST['postid'];
	$result=mysql_query("select * from posts where id=$postid");
	$row=mysql_fetch_array($result);
	$n=$row['likes'];

	mysql_query("update posts set likes=$n-1 where id=$postid");
	mysql_query("delete from likes where postid=$postid and userid=1");
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Like and Unlike</title>
	<style type="text/css">
		.content{
			width: 50%;
			margin: 100px auto;
			border:1px solid #cbcbcb;
		}
		.post{
			width: 80%;
			margin: 10px auto;
			border:1px solid #cbcbcb;
			padding: 10px;

		}
		
	</style>
</head>
<body>
	<div class="content">
	<?php
		$query=mysql_query("select * from posts");

		while($row = mysql_fetch_array($query))
		{?>
			<div class="post">
			 <?php echo $row['text']; ?><br>
			 <?php
			 	$result= mysql_query("select * from likes where userid=1 and postid=".$row['id']."");
			 	if(mysql_num_rows($result)==1){?>
				<span><a href="" class="unlike" id="<?php echo $row['id']; ?>">unlike</a></span>
				<?php } else {?>
					<span><a href="" class="like" id="<?php echo $row['id'];?>">like</a></span>
					<?php }?>
			</div>
		<?php }?>

	</div>
	<!--Add Jquery-->
	<script type="text/javascript" src="jquery-3.2.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.like').click(function(){
				var postid=$(this).attr('id');
				$.ajax({
						url:'index.php',
						type:'post',
						async:false,
						data:{
							'liked':1,
							'postid':postid

						},
						success:function(){

						}
					});
				});
				$('.unlike').click(function(){
				var postid=$(this).attr('id');
				$.ajax({
						url:'index.php',
						type:'post',
						async:false,
						data:{
							'unliked':1,
							'postid':postid

						},
						success:function(){

						}
					});
				});
			});
	</script>
</body>
</html>