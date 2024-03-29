<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wwwroot\floer\public/../application/admin\view\sms\smsindex.html";i:1526361663;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>短信通知列表</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="__CSS__/plugins/sweetalert/sweetalert.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>短信通知列表</h5>
        </div>
        <div class="ibox-content">
            <div class="form-group clearfix col-sm-1">
                <?php if(authCheck('sms/smsindex')): ?>
                <!--<a href="<?php echo url('sms/sendsms'); ?>">-->
                    <button class="btn btn-outline btn-primary sendsms" type="button">添加短信通知</button>
                <!--</a>-->
                <?php endif; ?>
            </div>
            <!--搜索框开始-->
            <form id='commentForm' role="form" method="post" class="form-inline pull-right">
                <div class="content clearfix m-b">
                    <div class="form-group">
                        <label>短信通知名称：</label>
                        <input type="text" class="form-control" id="username" name="user_name">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" style="margin-top:5px" id="search"><strong>搜 索</strong>
                        </button>
                    </div>
                </div>
            </form>
            <!--搜索框结束-->
            <div class="example-wrap">
                <div class="example">
                    <table id="cusTable">
                        <thead>
                        <th data-field="id">短信通知ID</th>
                        <th data-field="course_name">课程名称</th>
                        <th data-field="phone">电话</th>
                        <th data-field="begin_time">开课时间</th>
                        <th data-field="end_time">终止时间</th>
                        <th data-field="smstime">发送时间</th>
                        <th data-field="sms_author">操作者</th>
                        <th data-field="is_status">状态</th>
                        <th data-field="operate">操作</th>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- End Example Pagination -->
        </div>
    </div>
</div>
<!-- End Panel Other -->
</div>
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/content.min.js?v=1.0.0"></script>
<script src="__JS__/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="__JS__/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="__JS__/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<script src="__JS__/plugins/suggest/bootstrap-suggest.min.js"></script>
<script src="__JS__/plugins/layer/laydate/laydate.js"></script>
<script src="__JS__/plugins/sweetalert/sweetalert.min.js"></script>
<script src="__JS__/plugins/layer/layer.min.js"></script>
<script type="text/javascript">
    function initTable() {
        //先销毁表格
        $('#cusTable').bootstrapTable('destroy');
        //初始化表格,动态从服务器加载数据
        $("#cusTable").bootstrapTable({
            method: "get",  //使用get请求到服务器获取数据
            url: "<?php echo url('sms/smsindex'); ?>", //获取数据的地址
            striped: true,  //表格显示条纹
            pagination: true, //启动分页
            pageSize: 10,  //每页显示的记录数
            pageNumber:1, //当前第几页
            pageList: [5, 10, 15, 20, 25],  //记录数可选列表
            sidePagination: "server", //表示服务端请求
            paginationFirstText: "首页",
            paginationPreText: "上一页",
            paginationNextText: "下一页",
            paginationLastText: "尾页",
            queryParamsType : "undefined",
            queryParams: function queryParams(params) {   //设置查询参数
                var param = {
                    pageNumber: params.pageNumber,
                    pageSize: params.pageSize,
                    searchText:$('#username').val()
                };
                return param;
            },
            onLoadSuccess: function(res){  //加载成功时执行
                if(111 == res.code){
                    window.location.reload();
                }
                layer.msg("加载成功", {time : 1000});
            },
            onLoadError: function(){  //加载失败时执行
                layer.msg("加载数据失败");
            }
        });
    }
    $(document).ready(function () {
        //调用函数，初始化表格
        initTable();
        //当点击查询按钮的时候执行
        $("#search").bind("click", initTable);
    });

    /**
     * 添加短信通知
     */
    $('.sendsms').on('click',function(){
        layer.config({
            skin: 'demo-class'
        });
        layer.open({
            type: 2,
            title: ['短信通知', 'color: #900000;font-size:18px;'],
            area:  ['800px','550px'],
            btn:['确认', '取消'],
            content: ["<?php echo url('sms/sendsms'); ?>", ''], //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
            yes: function(index, layero){
                var form_top = $(window.frames["layui-layer-iframe"+index].document).find("#add_informSms"),
                        course_name = form_top.find("#course_name"),
                         begin_time = form_top.find("#begin_time"),
                        end_time = form_top.find("#end_time"),
                        phone = form_top.find('#phone');

                if(!course_name.val()){
                    layer.msg('填写课程',{icon:5});
                    course_name.focus();
                    return false;
                }
                if(!begin_time.val()){
                    layer.msg('填写开课时间',{icon:5});
                    begin_time.focus();
                    return false;
                }
                if(!end_time.val()){
                    layer.msg('填写终止时间',{icon:5});
                    end_time.focus();
                    return false;
                }
                if(end_time.val() < begin_time.val()){
                    layer.msg('终止时间不能小于开课时间',{icon:5});
                    return false;
                }
                if(!phone.val()){
                    layer.msg('填写需要通知的手机号码'+phone.val(),{icon:5});
                    phone.focus();
                    return false;
                }else if(phone.val().length < 11){
                    layer.msg('手机号码不能小于11位',{icon:5});
                    phone.focus();
                    return false;
                }
                var phoneVal = phone.val();
                if(phoneVal.length >= 12){
                    var arr =new Array();
                    arr=phoneVal.split(",");
                    for (var i=0;i<arr.length ;i++ )
                    {
                        if(arr[i].length <= 10){
                            layer.msg('第('+(i+1)+')个电话号码长度有误请重新输入',{icon:5});
                            phone.focus();
                            return false;
                        }
                        if(arr[i].length > 11){
                            layer.msg('第('+(i+1)+')个电话号码长度有误请重新输入',{icon:5});
                            phone.focus();
                            return false;
                        }
                        if(!/^1[0-9]{10}$/.test(arr[i])){
                            layer.msg('第('+(i+1)+')个电话号码有误请重新输入',{icon:5});
                            phone.focus();
                            return false;
                        }
                    }
                }else{
                    if(!phone.val()){
                        layer.msg('填写手机号',{icon:5});
                        phone.focus();
                        return false;
                    }else if(!/^1[0-9]{10}$/.test(phone.val())){
                        layer.msg('填写正确手机号',{icon:5});
                        phone.focus();
                        return false;
                    }
                }
                //按钮【按钮一】的回调
                $.post("<?php echo url('sms/sendsms'); ?>",$(window.frames["layui-layer-iframe"+index].document).find("#add_informSms").serialize(),function(data){
                    if(data.status == 1){
                        layer.msg('新增成功',{icon:1},function(){
                            layer.close(index);
                            location.reload(true);
                        });
                    }else{
                        layer.msg(data.msg,{icon:5});
                    }
                })
            },
            btn2: function(index, layero){
                //按钮【按钮二】的回调
                layer.close(index);
                //return false 开启该代码可禁止点击该按钮关闭
            }
        });
    });

    function roleDel(id){
        layer.confirm('确认删除此短信通知?', {icon: 3, title:'提示'}, function(index){
            //do something
            $.getJSON("<?php echo url('sms/delsms'); ?>", {'id' : id}, function(res){
                if(1 == res.status){
                    layer.msg(res.msg, {title: '友情提示', icon: 1, closeBtn: 0}, function(){
                        initTable();
                    });
                }else{
                    layer.msg(res.msg, {title: '友情提示', icon: 2});
                }
            });
            layer.close(index);
        })

    }
</script>
</body>
</html>
