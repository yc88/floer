<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/data/www/floer/public/../application/admin/view/member/index.html";i:1524031193;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会员列表</title>
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
            <h5>会员列表</h5>
        </div>
        <div class="ibox-content">
            <div class="form-group clearfix col-sm-1">
                <?php if(authCheck('member/addmember')): ?>
                <a href="<?php echo url('member/addmember'); ?>">
                    <button class="btn btn-outline btn-primary" type="button">添加会员</button>
                </a>
                <?php endif; ?>
            </div>
            <!--搜索框开始-->
            <form id='commentForm' role="form" method="post" class="form-inline pull-right">
                <div class="content clearfix m-b">
                    <div class="form-group">
                        <label>会员名称：</label>
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
                        <th data-field="id">会员ID</th>
                        <th data-field="user_name">用户名称</th>
                        <th data-field="user_phone">用户手机号码</th>
                        <th data-field="user_source">来源渠道</th>
                        <th data-field="user_login_time">最后登录时间</th>
                        <th data-field="addtime">添加时间</th>
                        <th data-field="user_status">用户状态</th>
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
            url: "./index", //获取数据的地址
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

    function userDel(id){
        layer.confirm('确认删除此会员?', {icon: 3, title:'提示'}, function(index){
            //do something
            $.getJSON("<?php echo url('member/delmember'); ?>", {'id' : id}, function(res){
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
