<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wwwroot\floer\public/../application/admin\view\system\addbanner.html";i:1524102729;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加banner</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css?v=4.1.0" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="__CSS__/upload_img.css" />
    <script type="text/javascript" src="__JS__/upload_images.js"></script>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加banner</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="commentForm" method="post" action="<?php echo url('system/addbanner'); ?>">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">banner标题：</label>
                            <div class="input-group col-sm-4">
                                <input id="name_z" type="text" class="form-control" name="title" required="" aria-required="true">
                            </div>
                            <label class="col-sm-3 control-label">链接地址：</label>
                            <div class="input-group col-sm-4">
                                <input id="name_y" type="text" class="form-control" name="link" required="" aria-required="true">
                            </div>
                            <label class="col-sm-3 control-label">排序：</label>
                            <div class="input-group col-sm-4">
                                <input id="age" type="text" class="form-control" name="sort" required="" aria-required="true">
                            </div>
                            <label class="col-sm-3 control-label">类型：</label>
                            <div class="input-group col-sm-4">
                                PC <input  type="radio" name="type" required="" checked aria-required="true" value="1">
                                手机 <input type="radio"  name="type" required="" aria-required="true" value="2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否显示：</label>
                            <div class="input-group col-sm-4">
                                显示 <input  type="radio" name="is_show" required="" checked aria-required="true" value="1">
                                隐藏 <input type="radio"  name="is_show" required="" aria-required="true" value="2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">图片：</label>
                            <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                <input name="default_img" value="" type="hidden" >
                                <div>
                                    <img style="display: inline;" src="/" onerror="this.src='__NoImg__'" class="show" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-6">
                                <input type="button" value="取消" class="btn btn-danger"onclick="javascript :history.back(-1);"/>
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/content.min.js?v=1.0.0"></script>
<script src="__JS__/plugins/validate/jquery.validate.min.js"></script>
<script src="__JS__/plugins/validate/messages_zh.min.js"></script>
<script src="__JS__/plugins/layer/layer.min.js"></script>
<script src="__JS__/jquery.form.js"></script>
<script type="text/javascript">
    new UploadImages(".form-horizontal");
    var index = '';
    function showStart(){
        index = layer.load(0, {shade: false});
        return true;
    }

    function showSuccess(res){
        layer.ready(function(){
            layer.close(index);
            if(1 == res.status){
                layer.msg('添加成功',{title: '友情提示', icon: 1, closeBtn: 0},function(){
                    window.location.href = res.msg;
                });
            }else{
                layer.msg(res.msg, {icon: 5});
            }
        });
    }

    $(document).ready(function(){
        // 添加角色
        var options = {
            beforeSubmit:showStart,
            success:showSuccess
        };

        $('#commentForm').submit(function(){
            $(this).ajaxSubmit(options);
            return false;
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
