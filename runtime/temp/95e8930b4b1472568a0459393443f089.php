<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\phpStudy\PHPTutorial\WWW\wittree\public/../application/index\view\login\login.html";i:1544266514;}*/ ?>
<!DOCTYPE html>
<html style="font-size: 20px">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>账号密码登录</title>
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
    <!--<script src="/static/index/javaScript/jquery.js"></script>-->
    <link rel="stylesheet" href="/static/index/css/pas-sign.css"/>
    <link rel="stylesheet" href="/static/index/css/public.css"/>
</head>
<body>
<header class="bar bar-nav">
    <a class="button button-link button-nav pull-left" data-transition='slide-out'>
        <span class="icon icon-left" style="color: #000" onclick="gofu()"></span>
    </a>
    <h1 class="title">智慧树</h1>
</header>
<nav>
    <img src="/static/index/images/head.jpg" class="name-img" alt=""/>
    <p class="dl-text">登录</p>
    <div class="inputs-from">
        <img src="/static/index/images/tell.png" alt=""/>
        <input type="number" class="tell-number" placeholder="请输入手机号"/>
    </div>
    <div class="inputs-from2">
        <img src="/static/index/images/ps.png" alt=""/>
        <input type="password" class="pas-box" placeholder="请输入密码"/>
    </div>
    <p class="sign-zc clearfix"><a href="<?php echo url('login/savepass'); ?>">忘记密码?</a><a href="<?php echo url('login/register'); ?>">没有账号，立即注册> </a></p>
    <button class="sign-btn">登录</button>
</nav>
<div class="xia-wx">
    <hr/>
    <div class="wx-title">快速登录</div>
    <p class="qt-title">其他登录方式</p>
    <a href="#"><img src="/static/index/images/wx.png" alt=""/></a>
</div>
<script>
    //--------登录
    $(".sign-btn").click(function () {
        if($(".tell-number").val().length ===11 &&  $(".pas-box").val()){
            $.ajax({
                type:"POST",
                url:"<?php echo url('login/login'); ?>",
                data:{
                    tell:$(".tell-number").val(),
                    password:$(".pas-box").val()
                },
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    if(data.code==-1){
                        yzmBtn = true;
                        $.toast(data.msg);
                        location.href = "<?php echo url('login/login'); ?>"
                    }else{
                        $.toast(data.msg);
                        location.href = "<?php echo url('customer/index'); ?>"
                    }
                }
            });
        }else{
            $.toast("账户或者密码有误");
        }
    })
</script>
</body>
</html>