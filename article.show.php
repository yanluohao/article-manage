<?php 
	require("connect.php");
	$id=intval($_GET['id']);
	$sql="select * from article where id='$id'";
	$res=mysqli_query($con,$sql);
	if($res&&mysqli_num_rows($res)!=0){
		$data=mysqli_fetch_assoc($res);
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>酱油-<?php echo $data['title']?></title>
 	<link rel="stylesheet" href="style/fontPage.css">
 </head>
 <body>
 	<header>
 		<div class="head-top">
 			<div class="comWidth">
 				<a href="#">登录</a>
 			</div>
 		</div>
 		<div class="fixed-head">
 			<div class="comWidth">
 				<ul class="fixed-nav clearfix">
 					<li><a href="">首页<span>HomePage</span></a></li>
 					<li class="active"><a href="article.showlist.php">文章分享<span>Share</span></a></li>
 					<li><a href="">关于我<span>About</span></a></li>
 					<li><a href="">假装有留言板<span>MessageBoard</span></a></li>
 				</ul>
 			</div>
 		</div>
 	</header>
 	<?php 
 		if(!empty($data)){
 	 ?>
 	<div class="content-module">
 		<div class="comWidth clearfix">
 			<div class="content-title">
 				<?php echo $data['title'] ?>
 			</div>
 			<div class="content-info">
 				作者：<?php echo $data['author'] ?>&nbsp;&nbsp;
 				发表时间：<?php echo date("Y-m-d",$data['dateline'])?>
 			</div>
 			<div class="content">
 				<?php $data['content']=preg_replace('/<[a-z]+>|<\/[a-z]+>/i','',$data['content']); echo $data['content'] ?>
 			</div>
 			<a class="back-to-contentlist" href="article.showlist.php">
 				返回文章列表
 			</a>
 		</div>
 	</div>
 	<?php 
 		}
 	 ?>
 	 <footer>
 	 	<div class="comWidth">
 	 		<p class="copyright">
 	 			Design by 酱油||渣渣前端练练手
 	 		</p>
 	 	</div>
 	 </footer>
 	 <script type="text/javascript" src="commonJS/fontEndCommon.js"></script>
 </body>
 </html>