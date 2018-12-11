<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"D:\phpStudy\PHPTutorial\WWW\wittree\public/../application/admin\view\course\lessonadd.html";i:1542962697;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加课时</title>
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
                    <h5>添加课时</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="commentForm" method="post"
                          action="<?php echo url('course/lessonadd'); ?>">
                        <input type="hidden" name="course_id" value="<?php echo $coursedata['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">标题：</label>
                            <div class="input-group col-sm-7">
                                <input id="title" type="text" class="form-control" name="title" required=""
                                       aria-required="true">
                            </div>
                        </div>
                        <!--<div class="form-group">-->
                            <!--<label class="col-sm-3 control-label">所属章节：</label>-->
                            <!--<div class="input-group col-sm-4">-->
                                <!--<select class="form-control" name="chapter_id" required="" aria-required="true">-->
                                    <!--<option value="">请选择</option>-->
                                    <!--<?php if(!empty($chapterdata)): ?>-->
                                    <!--<?php if(is_array($chapterdata) || $chapterdata instanceof \think\Collection || $chapterdata instanceof \think\Paginator): if( count($chapterdata)==0 ) : echo "" ;else: foreach($chapterdata as $key=>$vo): ?>-->
                                    <!--<option value="<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></option>-->
                                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                    <!--<?php endif; ?>-->
                                <!--</select>-->
                            <!--</div>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">课节：</label>
                            <div class="input-group col-sm-7">
                                <input id="lesson" type="text" class="form-control" name="lesson" required=""
                                       aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">所属课程：</label>
                            <div class="input-group col-sm-4">
                                <input id="" type="text" class="form-control" name="" disabled="disabled"
                                       value="<?php echo $coursedata['title']; ?>" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">缩略图：</label>
                            <input name="url" id="thumbnail" type="hidden"/>
                            <div class="form-inline">
                                <div class="input-group col-sm-2">
                                    <button type="button" class="layui-btn" id="test1">
                                        <i class="layui-icon">&#xe67c;</i>上传图片
                                    </button>
                                </div>
                                <div class="input-group col-sm-3">
                                    <div id="sm"></div>
                                </div>
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
                , url: "<?php echo url('lesson/uploadImg'); ?>" //上传接口
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
