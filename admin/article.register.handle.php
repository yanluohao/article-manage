<?php 
	require_once("../connect.php");
	$info=$_POST;
	if($_GET['type']==2){
		$name=$info['name'];
		$pwd=$info['password'];
		$sql="select * from userinfo where name='$name'";
		$searchRes=mysqli_query($con,$sql);
		if(mysqli_num_rows($searchRes)==0){
			$insertSql="insert into userinfo (name,password) values('$name','$pwd')";
			if(mysqli_query($con,$insertSql)){
				echo "<script>alert('注册成功');window.location.href='article-backend-login.php';</script>";
			}
		}
		else{
			echo "<script>alert('该用户已被注册');</script>";
		}
	}
	else if($_GET['type']==1){
		$name=$info['name'];
		$pwd=$info['password'];
		$sql="select * from userinfo where name='$name'";
		$searchRes=mysqli_query($con,$sql);
		if(mysqli_num_rows($searchRes)==0){
			echo "<script>alert('您输入的用户不存在,请重新输入');window.location.href='article-backend-login.php';</script>";
		}else{
			while($row=mysqli_fetch_assoc($searchRes)){
				$data[]=$row;
			}
			if($pwd==$data[0]['password']){
				echo "<script>alert('登录成功');window.location.href='article.manage.php';</script>";
			}
			else{
				echo "<script>alert('您输入的密码有误，请重新输入');window.location.href='article-backend-login.php';</script>";
			}
		}
	}
 ?>