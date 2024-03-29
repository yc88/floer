<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/data/www/floer/public/../application/admin/view/info/editinfo.html";i:1524195076;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑资讯</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="__CSS__/upload_img.css" />
    <script type="text/javascript" src="__JS__/upload_images.js"></script>
    <script type="text/javascript" src="/static/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="/static/bjp_public/kindeditor.js"></script>
    <link rel="stylesheet" href="__layui__/css/layui.css" media="all">
    <script src="__layui__/layui.js"></script>
    <link href="/static/videoJs/css/video-js.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-8" >
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <span data-dv="base" class="btn btn-primary">基本资料</span>
                    <!--<h5>编辑资讯</h5>-->
                </div>
                <div class="ibox-content base_1" >
                    <form class="form-horizontal m-t" id="commentForm" method="post" action="<?php echo url('info/editinfo'); ?>">
                        <input type="hidden" name="id" value="<?php echo $info['id']; ?>" >
                        <input type="hidden" name="old_img" value="<?php echo $info['info_img']; ?>" >
                 <div class="form-group">
                        <label class="col-sm-3 control-label">资讯分类：</label>
                        <div class="input-group col-sm-4">
                            <select name="info_cate" id="" class="form-control">
                                <option value="">请选择</option>
                                <?php foreach($infocate as $c): ?>
                                <option value="<?php echo $c['id']; ?>" <?php echo !empty($info['info_cate']) && $info['info_cate']==$c['id']?"selected":''; ?>><?php echo $c['cate_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                   </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">资讯名称：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" class="form-control" required="" aria-required="true" name="info_name" value="<?php echo $info['info_name']; ?>">
                            </div>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">资讯logo：</label>
                            <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                <input name="info_img" value="" type="hidden" >
                                <div>
                                    <img style="display: inline;" src="<?php echo getImgName($info['info_img'],300,150); ?>" onerror="this.src='__NoImg__'" class="show" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">资讯相关介绍：</label>
                            <div class="input-group col-sm-7">
                                <textarea class=" textarea" id="answerDetail" name="info_detail"><?php echo $info['info_detail']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">是否显示：</label>
                        <div class="input-group col-sm-4">
                            是 <input  type="radio" name="is_show" required="" checked aria-required="true" value="1" <?php echo !empty($info['is_show']) && $info['is_show']==1?"checked":''; ?>>
                            否 <input type="radio"  name="is_show" required="" aria-required="true" value="2" <?php echo !empty($info['is_show']) && $info['is_show']==2?"checked":''; ?>>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-6">
                                <input type="button" value="返回" class="btn btn-danger"onclick="javascript :history.back(-1);"/>
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="/static/videoJs/js/video.min.js"></script>
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/content.min.js?v=1.0.0"></script>
<script src="__JS__/plugins/validate/jquery.validate.min.js"></script>
<script src="__JS__/plugins/validate/messages_zh.min.js"></script>
<script src="__JS__/plugins/layer/layer.min.js"></script>
<script src="__JS__/jquery.form.js"></script>

<script src="/static/ueditor/ueditor.config.js"></script>
<script src="/static/ueditor/ueditor.all.js"></script>

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
                layer.msg('资讯成功',{title: '友情提示', icon: 1, closeBtn: 0},function(){
                    window.location.href = res.msg;
                });
            }else{
                layer.msg(res.msg, {icon: 5});
            }
        });
    }

    $(document).ready(function(){
        // 资讯角色
        var options = {
            beforeSubmit:showStart,
            success:showSuccess
        };

        $('#commentForm').submit(function(){
            $(this).ajaxSubmit(options);
            return false;
        });
        var editor = UE.getEditor('answerDetail');
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
