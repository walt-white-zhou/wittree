<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"D:\phpStudy\PHPTutorial\WWW\wittree\public/../application/index\view\customer\feedback.html";i:1544271888;}*/ ?>
<!DOCTYPE html>
<html style="font-size: 20px">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>意见反馈</title>
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
    <link rel="stylesheet" href="/static/index/css/fankui-yijian.css"/>
    <style>
        .layui-upload-file{
            z-index: 9999999;
            position: relative;
            width: 4rem;
            height: 4rem;
            display: block!important;
            margin-top: -4rem;
            margin-left: 0.5rem;
        }
    </style>
</head>
<body>
<header class="bar bar-nav">
    <a class="button button-link button-nav pull-left" data-transition='slide-out'>
        <span class="icon icon-left" style="color: #000" onclick="gofu()"></span>
    </a>
    <!--<a class="pull-right" href="javascript:void(0)"-->
    <!--style="color: #000;font-size: 0.8rem;margin-top: 0.5rem;position: relative;z-index: 999999">提交</a>-->
    <h1 class="title">意见反馈</h1>
</header>
<div class="them">
    <p class="top-text">请选择您要反馈的的问题类型...</p>
    <p class="class-btns">
        <?php if(is_array($feedback_type) || $feedback_type instanceof \think\Collection || $feedback_type instanceof \think\Paginator): $k = 0; $__LIST__ = $feedback_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <img <?php if($k == 1): ?>src="/static/index/images/fankui1.png" <?php elseif($k == 2): ?>src="/static/index/images/fankui2.png" <?php elseif($k == 3): ?>src="/static/index/images/fankui3.png"
             <?php elseif($k == 4): ?>src="/static/index/images/fankui4.png"
             <?php else: ?>src="/static/index/images/fankui5.png" <?php endif; ?> type="<?php echo $key; ?>" value="<?php echo $key; ?>" alt=""/>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </p>
</div>

<div class="mishu">
    <textarea placeholder="请简要描述问题"></textarea>
    <div class="layui-upload">
        <button type="button" class="layui-btn" id="test1">＋</button>
        <input name="url" id="thumbnail" type="hidden"/>
        <div class="layui-upload-list">
            <img class="layui-upload-img" id="demo1">
        </div>
    </div>
</div>

<div class="lianxi">
    <p>请输入联系人信息（选填）</p>
    <p><input type="text" class="name" placeholder="联系人"/></p>
    <p><input type="text" class="tell" placeholder="联系电话"/></p>
</div>


<button class="tijiao">提交</button>
<script>
    $(function () {
        $(".class-btns img").click(function () {
            $(this).css('border', '1px solid #fadf4a').siblings().css("border", "none")
            $(this).addClass('img-active').siblings().removeClass('img-active');
        });


        var themp = "";
        layui.use('upload', function () {
            var $ = layui.jquery
                , upload = layui.upload;

            //普通图片上传
            var uploadInst = upload.render({
                elem: '#test1'
                , url: "<?php echo url('customer/uploadfeedback'); ?>"
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#demo1').attr('src', result); //图片链接（base64）
                        $("#demo1").css("display", "block");
                        $("#test1").css("display", "none")
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }
                    //上传成功
                    themp = res[0];
                    $("#thumbnail").val(res.data.src);
                }
                , error: function () {
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function () {
                        uploadInst.upload();
                    });
                }
            });
        });


        $(".tijiao").click(function () {
            var type = $('.img-active').attr("type");
            var desc = $("textarea").val();
            if (type == "") {
                $.toast("问题类型不能为空！");
                return false;
            }
            if (desc == "") {
                $.toast("问题描述不能为空！");
                return false;
            }
            $.ajax({
                type: "POST",
                url: "<?php echo url('customer/feedback'); ?>",
                data: {
                    type: $('.img-active').attr("type"),
                    desc: $("textarea").val(),
                    linkman: $(".name").val(),
                    phone: $(".tell").val(),
                    url: $("#thumbnail").val(),
                },
                dataType: "json",
                success: function (data) {
                    console.log(data)
                    if (data.code === -1) {
                        $.toast(data.msg);
                    } else {
                        $.toast(data.msg);
                        location.href = "<?php echo url('customer/index'); ?>";
                    }
                }
            });
        });
    })


</script>
</body>
</html>