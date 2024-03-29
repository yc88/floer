<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/data/www/floer/public/../application/admin/view/question/questionback.html";i:1523942593;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>回复咨询</title>
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
                    <h5>回复咨询</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="commentForm" method="post" action="<?php echo url('question/questionback'); ?>">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">提问者：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $data['question_name']; ?>" required="" aria-required="true" disabled>
                            </div>
                            <label class="col-sm-3 control-label">提问时间：</label>
                            <div class="input-group col-sm-4">
                                <input value="<?php echo date('Y-m-d H:i:s',$data['question_time']); ?>" type="text" class="form-control" required="" aria-required="true" disabled>
                            </div>
                            <label class="col-sm-3 control-label">问题描述：</label>
                            <div class="input-group col-sm-4">
                                <textarea id="teacher_detail" class="form-control"  required="" aria-required="true" disabled><?php echo $data['question_detail']; ?></textarea>
                            </div>
                        </div>
                        <?php if($data['is_answer'] == 2): ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">回复者：</label>
                            <div class="input-group col-sm-7">
                                <input type="text" class="form-control" value="<?php echo $data['answer_author']; ?>" required="" aria-required="true" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">回复时间：</label>
                            <div class="input-group col-sm-7">
                                <input type="text" class="form-control" value="<?php echo date('Y-m-d H:i:s',$data['answer_time']); ?>" required="" aria-required="true" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">回复描述：</label>
                            <div class="input-group col-sm-7">
                                <textarea  class="form-control"  required="" aria-required="true"><?php echo $data['answer_detail']; ?></textarea>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">回复描述：</label>
                            <div class="input-group col-sm-7">
                                <textarea id="answer_detail" class="form-control" name="answer_detail" required="" aria-required="true"></textarea>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">是否显示：</label>
                        <div class="input-group col-sm-4">
                            是 <input  type="radio" name="is_show" required="" checked aria-required="true" value="1" <?php echo !empty($data['is_show']) && $data['is_show']==1?'checked' : ''; ?>>
                            否 <input type="radio"  name="is_show" required="" aria-required="true" value="2" <?php echo !empty($data['is_show']) && $data['is_show']==2?'checked' : ''; ?>>
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
                layer.msg('回复成功',{title: '友情提示', icon: 1, closeBtn: 0},function(){
                    window.location.href = res.msg;
                });
            }else{
                layer.msg(res.msg, {icon: 5});
            }
        });
    }

    $(document).ready(function(){
        // 回复角色
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
