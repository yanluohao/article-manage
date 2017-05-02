<?php 
	require("../connect.php");
	$id=$_GET['id'];
	$delsql="delete from article where id='$id'";
	if(mysqli_query($con,$delsql)){
		echo "<script>alert('文章删除成功');window.location.href='article.manage.php';</script>";
	}
	else{
		echo "<script>alert('文章删除失败');window.location.href='article.manage.php';</script>";
	}
 ?>