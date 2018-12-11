<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"D:\phpStudy\PHPTutorial\WWW\wittree\public/../application/admin\view\message\Messageadd.html";i:1544427093;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加消息</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="/static/admin/js/layui/css/layui.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-10">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加消息</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="commentForm" method="post"
                          action="<?php echo url('message/messageadd'); ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">内容：</label>
                            <div class="input-group col-sm-7">
                                <textarea id="description" class="form-control" name="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">发送用户：</label>
                            <div class="input-group col-sm-4">
                                <select class="form-control" name="uid">
                                    <option value="0">请选择</option>
                                    <?php if(!empty($customer)): if(is_array($customer) || $customer instanceof \think\Collection || $customer instanceof \think\Paginator): if( count($customer)==0 ) : echo "" ;else: foreach($customer as $key=>$vo): ?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['username']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-8">
                                <button class="btn btn-primary" type="submit">确认提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/admin/js/content.min.js?v=1.0.0"></script>
<script src="/static/admin/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/static/admin/js/plugins/validate/messages_zh.min.js"></script>
<script src="/static/admin/js/layui/layui.js"></script>
<script src="/static/admin/js/jquery.form.js"></script>
<script src="/static/admin/js/plugins/ueditor/ueditor.config.js"></script>
<script src="/static/admin/js/plugins/ueditor/ueditor.all.js"></script>
<script type="text/javascript">

    var index = '';

    function showStart() {
        index = layer.load(0, {shade: false});
        return true;
    }

    function showSuccess(res) {

        layer.ready(function () {
            layer.close(index);
            if (1 == res.code) {
                layer.alert(res.msg, {title: '友情提示', icon: 1, closeBtn: 0}, function () {
                    window.location.href = res.data;
                });
            } else if (111 == res.code) {
                window.location.reload();
            } else {
                layer.msg(res.msg, {anim: 6});
            }
        });
    }

    $(document).ready(function () {
        // 添加角色
        var options = {
            beforeSubmit: showStart,
            success: showSuccess
        };

        $('#commentForm').submit(function () {
            $(this).ajaxSubmit(options);
            return false;
        });

        $('#keywords').tagsinput('add', 'some tag');
        $(".bootstrap-tagsinput").addClass('col-sm-12').find('input').addClass('form-control')
            .attr('placeholder', '输入后按enter');

        // 上传图片
        layui.use('upload', function () {
            var upload = layui.upload;
            //执行实例
            var uploadInst = upload.render({
                elem: '#test1' //绑定元素
                , url: "<?php echo url('message/uploadImg'); ?>" //上传接口
                , done: function (res) {
                    //上传完毕回调
                    $("#thumbnail").val(res.data.src);
                    $("#sm").html('<img src="' + res.data.src + '" style="width:40px;height: 40px;"/>');
                }
                , error: function () {
                    //请求异常回调
                }
            });
        });

        var editor = UE.getEditor('container');
    });

    // 表单验证
    $.validator.setDefaults({
        highlight: function (e) {
            $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
        },
        success: function (e) {
            e.closest(".form-group").removeClass("has-error").addClass("has-success")
        },
        errorElement: "span",
        errorPlacement: function (e, r) {
            e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent())
        },
        errorClass: "help-block m-b-none",
        validClass: "help-block m-b-none"
    });
</script>
</body>
</html>
