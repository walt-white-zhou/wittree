<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"D:\phpStudy\PHPTutorial\WWW\wittree\public/../application/admin\view\customer\customeredit.html";i:1544173286;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑用户</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="/static/admin/js/layui/css/layui.css"rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>编辑用户</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="commentForm" method="post" action="<?php echo url('customer/customerEdit'); ?>">
                        <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">用户名称：</label>
                            <div class="input-group col-sm-4">
                                <input id="customername" type="text" class="form-control" name="username" required="" aria-required="true" value="<?php echo $customer['username']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">管理员角色：</label>
                            <div class="input-group col-sm-4">
                                <select class="form-control" name="role_id" required="" aria-required="true">
                                    <option value="0">请选择</option>
                                    <?php if(!empty($role)): if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): if( count($role)==0 ) : echo "" ;else: foreach($role as $key=>$vo): ?>
                                    <option value="<?php echo $vo['id']; ?>" <?php if($customer['role_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['role_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">头像：</label>
                            <input name="face" id="thumbnail" value="<?php echo $customer['face']; ?>" type="hidden"/>
                            <div class="form-inline">
                                <div class="input-group col-sm-2">
                                    <button type="button" class="layui-btn" id="test1">
                                        <i class="layui-icon">&#xe67c;</i>上传图片
                                    </button>
                                </div>
                                <div class="input-group col-sm-3">
                                    <div id="sm">
                                        <?php if($customer['face'] != ''): ?>
                                        <img src="<?php echo $customer['face']; ?>" width="40px" height="40px"/>
                                        <?php else: ?>
                                        <img src="/static/index/images/face.jpg" width="40px" height="40px">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">性别：</label>
                            <div class="input-group col-sm-6">
                                <?php if(is_array($sex) || $sex instanceof \think\Collection || $sex instanceof \think\Paginator): if( count($sex)==0 ) : echo "" ;else: foreach($sex as $key=>$vo): ?>
                                <div class="radio i-checks col-sm-4">
                                    <label>
                                        <input type="radio" value="<?php echo $key; ?>" <?php if($key == $customer['sex']): ?>checked<?php endif; ?> name="sex"> <i></i> <?php echo $vo; ?></label>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否启用：</label>
                            <div class="input-group col-sm-6">
                                <?php if(is_array($status) || $status instanceof \think\Collection || $status instanceof \think\Paginator): if( count($status)==0 ) : echo "" ;else: foreach($status as $key=>$vo): ?>
                                <div class="radio i-checks col-sm-4">
                                    <label>
                                        <input type="radio" value="<?php echo $key; ?>" <?php if($key == $customer['status']): ?>checked<?php endif; ?> name="status"> <i></i> <?php echo $vo; ?></label>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">联系电话：</label>
                            <div class="input-group col-sm-4">
                                <input id="phone" type="text" value="<?php echo $customer['phone']; ?>" class="form-control" name="phone" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">身份证：</label>
                            <div class="input-group col-sm-4">
                                <input id="id_number" type="text" value="<?php echo $customer['id_number']; ?>" class="form-control" name="id_number" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">地址：</label>
                            <div class="input-group col-sm-4">
                                <input id="address" type="text" value="<?php echo $customer['address']; ?>" class="form-control" name="address" required="" aria-required="true">
                            </div>
                        </div>
                        <!--<div class="form-group">-->
                            <!--<label class="col-sm-3 control-label">银行卡号：</label>-->
                            <!--<div class="input-group col-sm-4">-->
                                <!--<input id="bank_number" type="text" class="form-control" name="bank_number" value="<?php echo $customer['bank_number']; ?>" required="" aria-required="true">-->
                            <!--</div>-->
                        <!--</div>-->
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-6">
                                <!--<input type="button" value="提交" class="btn btn-primary" id="postform"/>-->
                                <button class="btn btn-primary" type="submit">提交</button>
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
<script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/static/admin/js/plugins/validate/messages_zh.min.js"></script>
<script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="/static/admin/js/plugins/layer/laydate/laydate.js"></script>
<script src="/static/admin/js/plugins/layer/layer.min.js"></script>
<script src="/static/admin/js/jquery.form.js"></script>
<script src="/static/admin/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="/static/admin/js/layui/layui.js"></script>
<script src="/static/admin/js/jquery.form.js"></script>
<script type="text/javascript">

    var index = '';
    function showStart(){
        index = layer.load(0, {shade: false});
        return true;
    }

    function showSuccess(res){

        layer.ready(function(){
            layer.close(index);
            if(1 == res.code){
                layer.alert(res.msg, {title: '友情提示', icon: 1, closeBtn: 0}, function(){
                    window.location.href = res.data;
                });
            }else if(111 == res.code){
                window.location.reload();
            }else{
                layer.msg(res.msg, {anim: 6});
            }
        });
    }


    $(document).ready(function(){
        $(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",});

        // 编辑用户
        var options = {
            beforeSubmit:showStart,
            success:showSuccess
        };

        $('#commentForm').submit(function(){
            $(this).ajaxSubmit(options);
            return false;
        });

        // 上传图片
        layui.use('upload', function(){
            var upload = layui.upload;

            //执行实例
            var uploadInst = upload.render({
                elem: '#test1' //绑定元素
                ,url: "<?php echo url('customer/uploadImg'); ?>" //上传接口
                ,done: function(res){
                    //上传完毕回调
                    $("#thumbnail").val(res.data.src);
                    $("#sm").html('<img src="' + res.data.src + '" style="width:40px;height: 40px;"/>');
                }
                ,error: function(){
                    //请求异常回调
                }
            });
        });
    });

    // 表单验证
    $.validator.setDefaults({
        highlight: function(e) {
            $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
        },
        success: function(e) {
            e.closest(".form-group").removeClass("has-error").addClass("has-success")
        },
        errorElement: "span",
        errorPlacement: function(e, r) {
            e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent())
        },
        errorClass: "help-block m-b-none",
        validClass: "help-block m-b-none"
    });

</script>
</body>
</html>
