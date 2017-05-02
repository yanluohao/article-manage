var searchBar = {
    search: function() {
        var keyVal = $(".search").val().trim();
        $.ajax({
            url: "article-search-handle.php",
            type: "POST",
            data: {
                KeyWords: keyVal
            },
            error: function(err) {
                alert(err);
            },
            success: function(result) {
            	$(".content-list-box>ul>li").remove();
                if (result.trim()) {
                    var dataint = JSON.parse(result);
                    var content = '';
                    for (var i = 0, len = dataint.length; i < len; i++) {
                        //添加id
                        content += '<li><a href="article.show.php?id=' + dataint[i].id + '" class="content_title">';
                        //添加标题
                        content += dataint[i].title + '</a>';
                        //添加阅读全文
                        content += '<p class="clearfix">' + dataint[i].description + '<a href="article.show.php?id=' + dataint[i].id + '" class="open-content">阅读全文</a></p>';
                        //添加底部行
                        content += '<div class="line-tips clearfix"><div class="content_author">作者：<span style="color:#fff;">' + dataint[i].author + '</span></div><div class="dateline">发表时间：' + dataint[i].dateline + '</div></div></li>';
                    }
                    $(".content-list-box>ul").append(content);
                }
                else{
                	var content='<li>该文章不存在</li>';
                	$(".content-list-box>ul").append(content);
                }
            }
        })
    }
}
