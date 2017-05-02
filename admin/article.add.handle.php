<?php 
	require_once("../connect.php");
	$title=$_POST['title'];
	$author=$_POST['author'];
	$description=$_POST['description'];
	$content=$_POST['content'];
	$dateline=time();
	$editLastTime=time();
	$insertsql="insert into article(title,author,description,content,dateline,editLastTime) values('$title','$author','$description','$content','$dateline','$editLastTime')";
	if(!mysqli_query($con,$insertsql)){
		echo '插入失败<br>'.mysql_error();
	}
	else{
		echo '<script>alert("发布成功");window.location.href="article.add.php";</script>';
	}
 ?>