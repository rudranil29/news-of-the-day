<?php
include 'dbconfig.php';
if(isset($_POST['btn-save']))
{
    $name=$_POST['user_name'];
    $mail=$_POST['user_email'];
    $password=$_POST['password'];
    $role_id=2;
    $password=md5($password);
$sql = mysql_query("INSERT INTO users (name,email,password,role_id)
VALUES ('".$name."','".$mail."','".$password."','".$role_id."')");
echo "successful";
}
else{
    echo "unsuccessful";
    die();
  }
?>
