<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"D:\phpStudy\PHPTutorial\WWW\wittree\public/../application/index\view\customer\compoundrank.html";i:1543914734;}*/ ?>
<!DOCTYPE html>
<html style="font-size: 20px">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>复利排行榜</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <script type='text/javascript' src='http://g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
    <script src="/static/index/javaScript/public.js"></script>
    <link rel="stylesheet" href="/static/index/css/public.css"/>
    <link rel="stylesheet" href="/static/index/css/ranking.css"/>
</head>
<body>
<header class="bar bar-nav">
    <a class="button button-link button-nav pull-left" data-transition='slide-out'>
        <span class="icon icon-left" style="color: #000" onclick="gofu()"></span>
    </a>
    <h1 class="title">复利排行榜</h1>
</header>
<div class="them">

    <div class="p-list-box">
        <!--<p><img src="/static/index/images/p1.png" class="p" alt=""/> <img src="/static/index/images/9B4DB0F9-EF78-41b2-B0D0-26D489764EB5.png" class="name-img" alt=""/> <span class="name-text">水娃</span> <span class="number">120人</span></p>-->
        <!--<p><img src="/static/index/images/p2.png" class="p" alt=""/> <img src="/static/index/images/9B4DB0F9-EF78-41b2-B0D0-26D489764EB5.png" class="name-img" alt=""/> <span class="name-text">水娃</span> <span class="number">120人</span></p>-->
        <!--<p><img src="/static/index/images/p3.png" class="p" alt=""/> <img src="/static/index/images/9B4DB0F9-EF78-41b2-B0D0-26D489764EB5.png" class="name-img" alt=""/> <span class="name-text">水娃</span> <span class="number">120人</span></p>-->
        <!--<p><span class="number-p">4</span> <img src="/static/index/images/9B4DB0F9-EF78-41b2-B0D0-26D489764EB5.png" class="name-img" alt=""/> <span class="name-text">水娃</span> <span class="number">120人</span></p>-->
        <!--<p><span class="number-p">5</span> <img src="/static/index/images/9B4DB0F9-EF78-41b2-B0D0-26D489764EB5.png" class="name-img" alt=""/> <span class="name-text">水娃</span> <span class="number">120人</span></p>-->
        <!--<p><span class="number-p">6</span> <img src="/static/index/images/9B4DB0F9-EF78-41b2-B0D0-26D489764EB5.png" class="name-img" alt=""/> <span class="name-text">水娃</span> <span class="number">120人</span></p>-->
        <!--<p><span class="number-p">7</span> <img src="/static/index/images/9B4DB0F9-EF78-41b2-B0D0-26D489764EB5.png" class="name-img" alt=""/> <span class="name-text">水娃</span> <span class="number">120人</span></p>-->
        <!--<p><span class="number-p">8</span> <img src="/static/index/images/9B4DB0F9-EF78-41b2-B0D0-26D489764EB5.png" class="name-img" alt=""/> <span class="name-text">水娃</span> <span class="number">120人</span></p>-->
        <!--<p><span class="number-p">9</span> <img src="/static/index/images/9B4DB0F9-EF78-41b2-B0D0-26D489764EB5.png" class="name-img" alt=""/> <span class="name-text">水娃</span> <span class="number">120人</span></p>-->
    </div>
</div>
<script>
    $(function () {
        $.ajax({
            type: "POST",  //提交方式
            url: "<?php echo url('Customer/compoundrank'); ?>",
            data: {},
            success: function (result) {
                if (result.code == -1) {
                    $('.p-list-box').html("");
                }
                var html = "";
                if (result.code == 0){
                    for (var i = 0; i <= result.data.length - 1; i++) {
                        html += '<p>'+result.data[i].rankstr+'' +
                            ' <img\n' +
                            '                src=' + result.data[i]['face'] + ' class="name-img" alt=""/> <span\n' +
                            '                class="name-text">' + result.data[i].username + '</span> <span class="number">' + result.data[i]['integral'] + '分</span>' +
                            '</p>';
                    }
                    // 添加新条目
                    $('.p-list-box').html(html);
                }
            }
        });
    })
</script>
</body>
</html>