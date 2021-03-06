<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"D:\phpStudy\PHPTutorial\WWW\wittree\public/../application/index\view\customer\addaddress.html";i:1544068649;}*/ ?>
<!DOCTYPE html>
<html style="font-size: 20px">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>添加地址</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <script type='text/javascript' src='http://g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
    <link rel="stylesheet" href="/static/index/javaScript/layui/css/layui.css"/>
    <script src="/static/index/javaScript/layui/layui.js"></script>
    <script src="/static/index/javaScript/public.js"></script>
    <link rel="stylesheet" href="/static/index/css/public.css"/>
    <!--<link rel="stylesheet" href="/static/index/css/shenfen.css"/>-->
    <style>
        .them {
            margin-top: 2.2rem;
        }

        .them p {
            border-bottom: 1px solid #f3f3f3;
        }

        .them p input {
            height: 2.5rem;
            border: none;
            width: 100%;
            padding: 0 1rem;
        }

        .mor-box {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            background-color: #FFFFFF;
            margin-top: 1rem;
        }

        .mor-box .item-input {
            float: right;
            vertical-align: middle;
        }

        .mor-box .mor-text {
            float: left;
            vertical-align: middle;
            margin-top: 0.2rem;
        }

        .label-switch .checkbox:before {
            background-color: #cccccc;
        }
    </style>
</head>
<body>
<header class="bar bar-nav">
    <a class="button button-link button-nav pull-left" data-transition='slide-out'>
        <span class="icon icon-left" style="color: #000" onclick="gofu()"></span>
    </a>
    <a class="pull-right" href="javascript:void(0)"
       style="color: #000;font-size: 0.8rem;margin-top: 0.5rem;position: relative;z-index: 999999">提交</a>
    <h1 class="title">添加地址</h1>
</header>
<div class="them">
    <p><input type="text" class="sh-name" placeholder="收货人"/></p>
    <p><input type="text" class="phone" placeholder="手机号码"/></p>
    <p><input type="text" class="area" placeholder="所在地区"/></p>
    <p><input type="text" class="address" placeholder="详细地址"/></p>
    <span class="mor-box clearfix">
        <span class="mor-text">设为默认地址</span>
         <div class="item-input" value="1">
             <label class="label-switch">
                 <input type="checkbox">
                 <div class="checkbox"></div>
             </label>
         </div>
    </span>

</div>
<script>
    $(function () {
        var status;
        $(".item-input").click(function () {
            if ($(this).attr("value") == "1") {
                $(this).attr("value", "0");
                status = 1;
            } else {
                $(this).attr("value", "1");
                status = 0;
            }
        });

        $("header .pull-right").bind("click", function () {
            if ($(".sh-name").val() == "") {
                $.toast("手机号不能为空！");
                return false;
            }
            if ($(".phone").val() == "") {
                $.toast("手机号不能为空！");
                return false;
            }
            if ($(".area").val() == "") {
                $.toast("地区不能为空！");
                return false;
            }
            if ($(".address").val() == "") {
                $.toast("详细地址不能为空！");
                return false;
            }
            $.ajax({
                type: "POST",
                url: "<?php echo url('customer/addaddress'); ?>",
                data: {
                    link_name: $(".sh-name").val(),
                    phone: $(".phone").val(),
                    area: $(".area").val(),
                    address: $(".address").val(),
                    status: status
                },
                dataType: "json",
                success: function (data) {
                    if (data.code === -1) {
                        $.toast(data.msg);
                    } else {
                        $.toast(data.msg);
                        location.href = "<?php echo url('customer/tishi'); ?>";
                    }
                }
            });
        })
    })

</script>
</body>
</html>