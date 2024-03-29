<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/data/www/floer/public/../application/admin/view/system/webconfig.html";i:1525663790;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>站点设置</title>
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
                    <h5>站点设置</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="commentForm" method="post" action="<?php echo url('system/webconfig'); ?>">
                        <?php if($site): ?>
                        <input type="hidden" name="id" value="<?php echo $site['id']; ?>">
                        <?php endif; if($site): ?>
                        <input type="hidden" name="old_logo" value="<?php echo $site['logo']; ?>">
                        <?php endif; ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">公司名称(中)：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" class="form-control" name="web_name_z" required="" aria-required="true" value="<?php echo $site['web_name_z']; ?>">
                            </div>
                         </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">公司名称(外)：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" name="web_name_y" required="" aria-required="true" value="<?php echo $site['web_name_y']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">网址地址：</label>
                            <div class="input-group col-sm-4">
                                <input   type="text" class="form-control" name="site_url" required="" aria-required="true" value="<?php echo $site['site_url']; ?>">
                            </div>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">电 话：</label>
                            <div class="input-group col-sm-4">
                                <input   type="text" class="form-control" name="phone" required="" aria-required="true" value="<?php echo $site['phone']; ?>">
                            </div>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">邮箱：</label>
                            <div class="input-group col-sm-4">
                                <input id="age" type="text" class="form-control" name="email" required="" aria-required="true" value="<?php echo $site['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">公司地址：</label>
                            <div class="input-group col-sm-4">
                                <input   type="text" class="form-control" name="address" required="" aria-required="true" value="<?php echo $site['address']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">备案号码：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" class="form-control" name="records" required="" aria-required="true" value="<?php echo $site['records']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">LOGO：</label>
                            <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                <input name="default_img" value="" type="hidden" >
                                <div>
                                    <img style="display: inline;" src="<?php echo getImgName($site['logo'],120,100); ?>" onerror="this.src='__NoImg__'" class="show" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-6">
                                <button class="btn btn-primary" type="submit">修改</button>
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
                layer.msg(res.msg,{title: '友情提示', icon: 1, closeBtn: 0},function(){
                    location.replace(location.href);
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
