<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wwwroot\floer\public/../application/admin\view\order\orderdetail.html";i:1526291127;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单详情</title>
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
    <style type="text/css">
        input{
            border:none;
        }
    </style>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-8" >
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span data-dv="base1" class="btn btn-primary">订单信息</span>
                    <span data-dv="base2" class="btn btn-danger">用户信息</span>
                    <span data-dv="base3" class="btn btn-primary">课程信息</span>
                    <!--<h5>编辑课程</h5>-->
                </div>
                <div class="ibox-content base_0" >
                        <div class="form-group">
                            <label class="col-sm-3 control-label">订单编号：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $data['order_no']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">订单价格：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $data['price']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">付款状态：</label>
                            <div class="input-group col-sm-4">
                                <?php switch($data['order_status']): case "1": ?>
                                <span class="btn btn-danger">未付款</span><?php break; case "2": ?>
                                <span class="btn btn-primary">已付款</span><?php break; default: ?>
                                <span class="btn btn-danger">未知</span>
                                <?php endswitch; ?>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">支付方式：</label>
                        <div class="input-group col-sm-4">
                            <?php switch($data['pay_type']): case "1": ?>
                            <span class="btn btn-primary">微信支付</span><?php break; case "2": ?>
                            <span class="btn btn-danger">支付宝</span><?php break; default: ?>
                            <span class="btn btn-danger">其他</span>
                            <?php endswitch; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">支付方式订单号：</label>
                        <div class="input-group col-sm-4">
             <input type="text"  class="form-control" value="<?php echo $data['pay_type_no']; ?>" disabled>
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">交款方式：</label>
                            <div class="input-group col-sm-4">
                                <?php switch($data['payment_type']): case "1": ?>
                                <span class="btn btn-primary">全款</span><?php break; case "2": ?>
                                <span class="btn btn-danger">定金</span><?php break; default: ?>
                                <span class="btn btn-danger">未知</span>
                                <?php endswitch; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">购买时间：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})" id="logmin" class="form-control Wdate" style="width:120px;" name="startime" value="<?php echo date('Y-m-d',$data['oktime']); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">付款时间：</label>
                            <div class="input-group col-sm-7">
                                <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})" id="logmin" class="form-control Wdate" style="width:120px;" name="endtime" value="<?php echo date('Y-m-d',$data['addtime']); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">联系电话：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" required="" aria-required="true" value="<?php echo $data['tel']; ?>" disabled>
                            </div>
                        </div>

<?php if(!empty($residue)): ?>
                    <!-- 余额订单信息-->
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="input-group col-sm-4">
                            <label class="col-sm-8 control-label" style="color: #ffffff; background: #00625A;text-align: center">余额支付订单信息</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">订单编号：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" required="" aria-required="true" value="<?php echo $residue['order_no']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">支付金额（余额）：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" required="" aria-required="true" value="<?php echo $residue['price']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">付款时间：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" required="" aria-required="true" value="<?php echo date('Y-m-d H:i:s',$residue['oktime']); ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">付款方式：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" required="" aria-required="true" value="<?php echo !empty($residue['pay_type']) && $residue['pay_type']==1?'微信支付':'线下支付'; ?>" disabled>
                        </div>
                    </div>

                    <?php switch($residue['pay_type']): case "3": ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">余款线下支付时编辑者：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" required="" aria-required="true" value="<?php echo $residue['edit_author']; ?>" disabled>
                        </div>
                    </div>
                    <?php break; endswitch; elseif($data['payment_type'] == 2): ?>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-6" style="margin-left: 150px;">
                            <input type="button" value="支付余款" class="btn btn-primary" id="add_residue" data-order_no="<?php echo $data['order_no']; ?>"/>
                        </div>
                    </div>
     <?php endif; ?>
                        <!-- 图片-->
                </div>
                <div class="ibox-content base_1" >
                    <div class="form-group">
                        <label class="col-sm-3 control-label">用户名称：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" value="<?php echo $user['user_name']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">用户电话：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" value="<?php echo $user['user_phone']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">用户性别：</label>
                        <div class="input-group col-sm-4">
                            <?php switch($user['user_sex']): case "1": ?>
                            <span class="btn btn-danger">男</span><?php break; case "2": ?>
                            <span class="btn btn-primary">女</span><?php break; default: ?>
                            <span class="btn btn-danger">未知</span>
                            <?php endswitch; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">注册时间：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})" id="logmin" class="form-control Wdate" style="width:120px;" name="startime" value="<?php echo date('Y-m-d',$user['addtime']); ?>" disabled>
                        </div>
                    </div>

                </div>
                <div class="ibox-content base_2" >
                    <div class="form-group">
                        <label class="col-sm-3 control-label">课程名称：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" value="<?php echo $course['classify_name']; ?>" disabled>
                            <input type="text" class="form-control" value="<?php echo $course['courser_name']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">添加时间：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})" id="logmin" class="form-control Wdate" style="width:120px;" name="startime" value="<?php echo date('Y-m-d',$course['addtime']); ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">课程开始时间：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})" id="logmin" class="form-control Wdate" style="width:120px;" name="startime" value="<?php echo date('Y-m-d',$course['begins_time']); ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">课程结束时间：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})" id="logmin" class="form-control Wdate" style="width:120px;" name="startime" value="<?php echo date('Y-m-d',$course['end_time']); ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">上课人数：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" value="<?php echo $course['courser_num']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">课程全价格：</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" value="<?php echo $course['courser_price']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">课程介绍：</label>
                        <div class="input-group col-sm-4">
                            <textarea  disabled class="form-control" id="" cols="30" rows="10"><?php echo $course['courser_detail']; ?></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">是否已发布：</label>
                        <div class="input-group col-sm-4">
                            <?php switch($course['is_publish']): case "1": ?>
                            <span class="btn btn-danger">是</span><?php break; case "2": ?>
                            <span class="btn btn-primary">否</span><?php break; default: ?>
                            <span class="btn btn-danger">未知</span>
                            <?php endswitch; ?>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-6">
                        <input type="button" value="返回" class="btn btn-danger" onclick="javascript :history.back(-1);"/>
                    </div>
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

    $("#add_residue").on('click',function(){
        var order_no,status;
        order_no = $(this).data('order_no');
        if(!order_no){
            layer.msg('系统错误');
            return false;
        }
        layer.confirm('你确定是线下支付嘛？', function () {
            $.post("<?php echo url('order/addresidue'); ?>", {order_no: order_no}, function (data) {
                if (data.status == 1) {
                    layer.msg(data.msg, {icon: 6}, function () {
                        location.replace(location.href);
                    })
                } else {
                    layer.msg(data.msg, {icon: 5}, function () {
                        location.replace(location.href);
                    })
                }
            });
            layer.closeAll();
        })
    });
</script>
<script type="text/javascript">
    $('.base_1').hide();
    $('.base_2').hide();
    $('.ibox-title span').on('click',function(){
        var index = $(this).index();
        switch (index){
            case 0:
                $('.base_'+index).show();
                $('.base_'+(index+1)).hide();
                $('.base_'+(index-1)).hide();
                break;
            case 1:
                $('.base_'+index).show();
                $('.base_'+(index+1)).hide();
                $('.base_'+(index-1)).hide();
                break;
            case 2:
                $('.base_'+index).show();
                $('.base_'+(index-2)).hide();
                $('.base_'+(index-1)).hide();
                break;
        }
    });
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
                layer.msg('课程成功',{title: '友情提示', icon: 1, closeBtn: 0},function(){
                    window.location.href = res.msg;
                });
            }else{
                layer.msg(res.msg, {icon: 5});
            }
        });
    }

    $(document).ready(function(){
        // 课程角色
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


    var editor;
    KindEditor.ready(function (K) {
        //课程描述
        editor = K.create('#answerDetail', {
            resizeType: 1,
            autoHeightMode: true,
            allowPreviewEmoticons: true,
            allowImageUpload: true,
            allowFlashUpload: false,
            allowMediaUpload: false,
            items: [
                'source', 'undo', 'redo', 'cut', 'copy', 'paste', 'plainpaste', 'selectall', '|', 'justifyleft', 'justifycenter', 'justifyright', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', 'insertorderedlist', 'insertunorderedlist', 'strikethrough', 'indent', 'outdent', 'subscript', 'superscript', '|', 'emoticons', 'image', 'media', 'table', 'preview', 'pagebreak', 'clearhtml', 'quickformat', 'print', 'fullscreen']
        });
    });
</script>
</body>
</html>
