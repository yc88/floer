<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wwwroot\floer\public/../application/admin\view\sms\sendsms.html";i:1526352978;}*/ ?>
<link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
<link href="__CSS__/animate.min.css" rel="stylesheet">
<link href="__CSS__/style.min.css?v=4.1.0" rel="stylesheet">
<link rel="stylesheet" href="__layui__/css/layui.css" media="all">
<script src="__layui__/layui.js"></script>
<script type="text/javascript" src="/static/My97DatePicker/4.8/WdatePicker.js"></script>
<style type="text/css">
    .float_css{
        float: right;
        margin-left: 5px;
    }
</style>
<form action="" id="add_informSms" method="post" data-ac="888">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-8">
                <div class="ibox-title">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">通知的课程：</label>
                        <div class="input-group col-sm-8 float_css">
                            <input  type="text" class="form-control" required="" id="course_name" aria-required="true" name="course_name" value="888588">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">开课时间：</label>

                        <div class="input-group col-sm-5 float_css">
                            <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})"
                                   class="form-control Wdate" style="width:120px;" name="begin_time" value="" id="begin_time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">终止时间：</label>

                        <div class="input-group col-sm-5 float_css">
                            <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})" id="end_time"
                                   class="form-control Wdate" style="width:120px;" name="end_time" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">电话号码 <span style="color: red;">(多位号码以英文的,隔开)</span>：</label>
                        <div class="input-group col-sm-8 float_css">
                            <textarea class=" textarea" id="phone" name="phone" style="height: 300px;width: 300px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
