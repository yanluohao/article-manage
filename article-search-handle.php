<?php 
	require_once("connect.php");
	$keywords=$_POST['KeyWords'];
	if(!empty($keywords)){
		$sql="select id,title,author,description,dateline from article where title like '%".$keywords."%' order by dateline desc";
	}
	else{
		$sql="select id,title,author,description,dateline from article order by dateline desc limit 0,9";
	}
	$res=mysqli_query($con,$sql);
	if($res&&mysqli_num_rows($res)!=0){
		while($row=mysqli_fetch_assoc($res)){
			$data[]=$row;
		}
		//多维数组里的时间格式化成日期格式
		foreach($data as $i=>$j){
			$data[$i]['dateline']=date("Y-m-d",$j['dateline']);
		}
		$data=json_encode($data);
	}
	else{
		$data="";
	}
	echo $data;
 ?>