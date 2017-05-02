<?php 
	require("connect.php");
	$sql="select * from article order by dateline desc";
	$res=mysqli_query($con,$sql);
	if($res&&mysqli_num_rows($res)!=0){
		while($row=mysqli_fetch_assoc($res)){
			$data[]=$row;
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>酱油-文章分享</title>
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
 	<div class="logoBar">
 		<img src="" alt="此处为个人logo">
 	</div>
 	<div class="bannerBox">
 		<div class="scrollbg"></div>
 		<div class="banner-content">
 			<span>欢迎来到我的个人主站</span>
 		</div>	
 	</div>
 	<div class="comWidth">
 		<div class="content-list module">
 			<h2 class="module-title">文章分享</h2>
 			<div class="content-list-box clearfix">
 				<ul style="float: left;">
 				    <?php 
 						if(!empty($data)){
 							foreach($data as $value){
 					 ?>
 					<li>
 						<a href="article.show.php?id=<?php echo $value['id'] ?>" class="content_title"><?php echo $value['title'] ?></a>
 						<p class="clearfix"><?php echo $value['description'] ?>
 							<a href="article.show.php?id=<?php echo $value['id'] ?>" class="open-content">阅读全文</a>
 						</p>
 						<div class="line-tips clearfix">
 							<div class="content_author">
 								作者：<span style="color:#fff;"><?php echo $value['author'] ?></span>
 							</div>
 							<div class="dateline">发表时间：<?php echo date("Y-m-d",$value['dateline']) ?></div>
 						</div>
 					</li>
 					<?php 
 							}
 						}
 						else{
 							echo "<li>暂时没有文章哟!</li>";
 						}
 					 ?>
 				</ul>
 				<div class="content-list-right clearfix">
 					<div class="search-box">
 						<input type="text" class="search" placeholder="请输入你要搜索的文章" name="search" onkeyup="searchBar.search()">
 						<a href="javascript:;" class="search-btn" onclick="searchBar.search()">搜索</a>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<footer>
 		<div class="comWidth">
 			<p class="copyright">
 				Design by 酱油||渣渣前端练练手
 			</p>
 		</div>
 	</footer>
 	<script type="text/javascript" src="commonJS/fontEndCommon.js"></script>
 	<script type="text/javascript" src="commonJS/jquery.js"></script>
 	<script type="text/javascript" src="commonJS/ajax.js"></script>
 </body>
 </html>