<?php 
	require_once("../connect.php");
	//获取旧信息
	$id=intval($_GET['id']);
	$query=mysqli_query($con,"select * from article where id=$id");
	$data=mysqli_fetch_assoc($query);
	$a=$data['id'];
	echo "<script>var a=$a;</script>";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>后台修改文章</title>
 	<link rel="stylesheet" href="../style/bootstrap.min.css">
 	<link rel="stylesheet" href="../style/main.css">
 </head>
 <body>
 	<div class="header">
 		<p class="system_title">文章后台管理系统</p>
 	</div>
 	<div class="content clearfix">
 		<div class="content_left">
 		<ul>
 			<li><a href="article.add.php">发布文章</a></li>
 			<li><a href="article.manage.php">管理文章</a></li>
 		</ul>
 		</div>
 		<div class="content-right">
 			<h3>发布文章</h3>
 			<form action="article.modify.handle.php" method="post" accept-charset="utf-8" name="form1" class="form1">
 			    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
 				<div>
 					<span>标题：</span>
 					<input type="text" name="title" value="<?php echo $data['title'] ?>" placeholder="请输入文章的标题" class="form-control title">
 				</div>
 				<div>
 					<span>作者：</span>
 					<input type="text" name="author" value="<?php echo $data['author'] ?>" placeholder="请输入文章的作者" class="form-control author">
 				</div>
 				<div style="position: relative;">
 					<span>简介：</span>
 					<textarea name="description" rows="10" cols="100" class="form-control description"><?php echo $data['description'] ?></textarea>
 					<span style="position: absolute;left: 600px;text-align: right;"><a>0</a>/100</span>
 				</div>
 				<div class="clearfix">
 					<span>内容：</span>
 					 <!-- 加载编辑器的容器 -->
 					 <script id="container" name="content" type="text/JavaScript" style="width: 800px;height: 300px;float: left;">
 					     <?php echo $data['content'] ?>
 					 </script>
 					 <!-- 导入UEditor文件 -->
 					 <script type="text/javascript" src="../libs/utf8-php/ueditor.config.js"></script>
 					 <script type="text/javascript" src="../libs/utf8-php/ueditor.all.js"></script>

 					<!--  实例化编辑器 -->
 					 <script type="text/javascript">
 					     var editor=UE.getEditor('container');
 					 </script>
 				</div>
 				<div>
 					<input type="submit" name="" value="提交" placeholder="" class="form-control editContent" style="width: 200px;margin:20px auto;">
 				</div>
 			</form>
 		</div>
 	</div>
 	<script type="text/javascript">
 		var description=document.querySelector(".description");
 		getLength();
 		function getLength(){
 			var desLength=description.value.length;
 			description.nextElementSibling.childNodes[0].innerHTML=desLength;     //nextElementSibling获取同级元素的后一位元素
 		}
 		description.onkeyup=getLength;
 	</script>
 </body>
 </html>