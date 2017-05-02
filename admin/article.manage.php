<?php 
	require_once("../connect.php");
	$selectsql="select * from article order by dateline desc";
	if($res=mysqli_query($con,$selectsql)){
		while($row=mysqli_fetch_assoc($res)){
			$data[]=$row;           //将返回的结果以数组的形式接受。
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/main.css">
    <style type="text/css">
    .article_list_backend li {
        height: 30px;
        line-height: 30px;
    }
    </style>
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
        <div class="content-right" style="padding:30px 0 0 30px;">
            <ul class="article_list_backend">
                <li>
                    <div class="article_list_id">ID</div>
                    <div class="article_list_title">文章标题</div>
                    <div class="article_list_date">更新时间</div>
                    <div class="article_list_handle">操作</div>
                </li>
                <?php 
					if(!empty($data)){
					foreach($data as $value){
	 			?>
                <li>
                    <div class="article_list_id">
                        <?php 
					echo $value['id']
				 ?>
                    </div>
                    <div class="article_list_title">
                        <?php 
					echo $value['title']
				 ?>
                    </div>
                    <div class="article_list_date">
                        <?php 
                            echo date("Y-m-d",$value['editLastTime'])
                         ?>
                    </div>
                    <div class="article_list_handle">
                        <a href="article.modify.php?id=<?php echo $value['id'] ?>">修改</a>
                        <a href="article.del.handle.php?id=<?php echo $value['id'] ?>" onclick="javascript:return del()">删除</a>
                    </div>
                </li>
                <?php 
					 }
					}
				?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
    function del() {
        var tips = "您真的确定要删除吗;删除后不可恢复";
        if (confirm(tips) == true) {
            return true;
        } else {
            return false;
        }
    }
    window.onload=function(){
    	var content_right=document.querySelector(".content-right");
    	var r_height=document.documentElement.clientHeight||document.body.clientHeight;
    	content_right.style.height=r_height-70+"px";
    }
    </script>
</body>

</html>
