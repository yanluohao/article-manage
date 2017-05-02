//头部固定导航栏
var head = document.querySelector(".head-top");
var fixedHead = document.querySelector(".fixed-head");
window.onscroll = function() {
    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    if (scrollTop == 0) {
        head.style.display = "block";
        fixedHead.className = "fixed-head";
    } else {
        head.style.display = "none";
        fixedHead.className += " active";
    }
}


console.log("渣渣网站，需要各位大佬多多提点，本屌的个人邮箱345072986@qq.com，膜拜各位大佬");
