<?php 
	require_once("../connect.php");
	$title=$_POST["title"];
	$author=$_POST["author"];
	$description=$_POST["description"];
	$content=$_POST["content"];
	$editLastTime=time();
	$id=$_POST["id"];
	$updatesql="update article set title='$title',author='$author',description='$description',content='$content',editLastTime='$editLastTime' where id=$id";
	if(mysqli_query($con,$updatesql)){
		echo '<script>alert("修改成功");window.location.href="article.manage.php";</script>';
	}
	else{
		echo mysqli_error($con);
	}
 ?>