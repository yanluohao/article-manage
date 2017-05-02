<?php
	require_once("config.php");
	// //连库
	// if(!$con=mysql_connect(HOST,USERNAME,PASSWORD)){
	// 	echo mysql_error();
	// }
	// //选库
	// if(!mysql_select_db("test")){
	// 	echo mysql_error();
	// }

	//mysqli连库
	if(!$con=mysqli_connect(HOST,USERNAME,PASSWORD,"test")){
		echo mysql_error();
	}
	//字符集
	mysqli_query($con,"set names utf8");
?>