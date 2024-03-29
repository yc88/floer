<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wwwroot\floer\public/../application/admin\view\node\index.html";i:1523683387;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>节点信息</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="__JS__/layui/css/layui.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins col-sm-5">
        <div class="ibox-title">
            <h5>节点信息</h5>
        </div>
        <div class="ibox-content">
            <div class="form-group">
                <?php if(authCheck('node/nodeadd')): ?>
                    <button class="btn btn-outline btn-primary" type="button" id="addNode">添加顶级节点</button>
                <?php endif; ?>
                <button class="btn btn-outline btn-success" type="button" onclick="window.location.reload();">刷新树</button>
            </div>

            <div class="ibox-content">
                <div class="col-sm-6">
                    <ul id="tree"></ul>
                </div>
                <div class="col-sm-6">
                    <div id="event_output"></div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>


<!-- 添加节点 -->
<div class="ibox-content" id="node_box" style="display: none">
    <form class="form-horizontal m-t" method="post" action="<?php echo url('node/nodeAdd'); ?>" id="addForm">
        <input type="hidden" class="form-control" value="0" name="type_id" id="pid">
        <div class="form-group">
            <label class="col-sm-3 control-label">节点名称：</label>
            <div class="input-group col-sm-7">
                <input id="node_name" type="text" class="form-control" name="node_name" required="" aria-required="true">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">所属节点：</label>
            <div class="input-group col-sm-7">
                <input id="show_pid" type="text" class="form-control" value="顶级节点" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">控制器名：</label>
            <div class="input-group col-sm-7">
                <input id="control_name" type="text" class="form-control" name="control_name" required="" aria-required="true" placeholder="全小写">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">方法名：</label>
            <div class="input-group col-sm-7">
                <input id="action_name" type="text" class="form-control" name="action_name" required="" aria-required="true" placeholder="全小写">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">是否是菜单项：</label>
            <div class="input-group col-sm-7">
                <select class="form-control" name="is_menu" required="" aria-required="true" id="is_menu">
                    <option value="1">否</option>
                    <option value="2">是</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">菜单图标：</label>
            <div class="input-group col-sm-7">
                <input id="style" type="text" class="form-control" name="style" placeholder="只有顶级节点需要">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-8">
                <button class="btn btn-primary" type="submit">提交</button>
            </div>
        </div>
    </form>
</div>
<!-- 添加节点 -->

<!-- 编辑节点 -->
<div class="ibox-content" id="edit_box" style="display: none">
    <form class="form-horizontal m-t" method="post" action="<?php echo url('node/nodeEdit'); ?>" id="editForm">
        <input type="hidden" name="id" id="id"/>
        <div class="form-group">
            <label class="col-sm-3 control-label">节点名称：</label>
            <div class="input-group col-sm-7">
                <input id="e_node_name" type="text" class="form-control" name="node_name" required="" aria-required="true">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">控制器名：</label>
            <div class="input-group col-sm-7">
                <input id="e_control_name" type="text" class="form-control" name="control_name" required="" aria-required="true" placeholder="全小写">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">方法名：</label>
            <div class="input-group col-sm-7">
                <input id="e_action_name" type="text" class="form-control" name="action_name" required="" aria-required="true" placeholder="全小写">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">是否是菜单项：</label>
            <div class="input-group col-sm-7">
                <select class="form-control" name="is_menu" required="" aria-required="true" id="e_is_menu">

                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">菜单图标：</label>
            <div class="input-group col-sm-7">
                <input id="e_style" type="text" class="form-control" name="style" placeholder="只有顶级节点需要">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-8">
                <button class="btn btn-primary" type="submit">提交</button>
            </div>
        </div>
    </form>
</div>
<!-- 添加节点 -->


<!-- 节点操作询问层 -->
<div class="ibox-content" id="ask_box" style="display: none">
    <div class="form-horizontal m-t">
        <div class="form-group" style="text-align: center">
            <?php if(authCheck('node/nodeadd')): ?>
            <button class="btn btn-outline btn-success" type="button" id="addsubNode">
                <i class="fa fa-plus"></i>
                添加子节点
            </button>
            <?php endif; if(authCheck('node/nodeedit')): ?>
            <button class="btn btn-outline btn-primary" type="button" id="editNode">
                <i class="fa fa-edit"></i>
                编辑节点
            </button>
            <?php endif; if(authCheck('node/nodedel')): ?>
            <button class="btn btn-outline btn-danger" type="button" id="delNode">
                <i class="fa fa-trash-o"></i>
                删除节点
            </button>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- 节点操作询问层 -->

<!-- End Panel Other -->
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/content.min.js?v=1.0.0"></script>
<script src="__JS__/layui/layui.js"></script>
<script src="__JS__/jquery.form.js"></script>

<script type="text/javascript">
var node_del_url = "<?php echo url('node/nodeDel'); ?>";
var box;
var nowNode = null;

$(function(){

    getTree();

    $("#addNode").click(function(){
        $("#control_name").val('#');
        $("#action_name").val('#');
        $("#pid").val(0);
        $("#show_pid").val('顶级节点');

        layui.use('layer', function(){
            box = layer.open({
                type: 1,
                title: '添加顶级节点',
                anim: 2,
                skin: 'layui-layer-molv', //加上边框
                area: ['620px', '440px'], //宽高
                content: $('#node_box')
            });
        });
    });

    $("#addsubNode").click(function(){
        layer.close(box);
        $('#show_pid').val(nowNode.name);
        $('#pid').val(nowNode.id);
        $("#control_name").val('');
        $("#action_name").val('');
        layui.use('layer', function(){
            box = layer.open({
                type: 1,
                title: '添加 ' + nowNode.name + ' 的子菜单',
                anim: 2,
                skin: 'layui-layer-molv', //加上边框
                area: ['620px', '440px'], //宽高
                content: $('#node_box')
            });
        });
    });

    $("#editNode").click(function(){
        layer.close(box);
        $("#id").val(nowNode.id);
        $("#e_node_name").val(nowNode.name);
        $("#e_control_name").val(nowNode.control_name);
        $("#e_action_name").val(nowNode.action_name);
        $("#e_style").val(nowNode.style);

        var _option1 = '<option value="1" selected>否</option><option value="2">是</option>';
        var _option2 = '<option value="1">否</option><option value="2" selected>是</option>';
        if(1 == nowNode.is_menu){
            $("#e_is_menu").html(_option1);
        }else{
            $("#e_is_menu").html(_option2);
        }

        layui.use('layer', function(){
            box = layer.open({
                type: 1,
                title: '编辑  ' + nowNode.name + '  节点',
                anim: 2,
                skin: 'layui-layer-molv', //加上边框
                area: ['620px', '400px'], //宽高
                content: $('#edit_box')
            });
        });
    });

    $("#delNode").click(function(){
        layer.close(box);
        if(nowNode.children.length > 0){
            layer.alert('该节点下有子节点，不可删除', {icon:2, title:'失败提示', closeBtn:0, anim:6});
            return false;
        }

        //询问框
        var index = layer.confirm('确定要删除' + nowNode.name + '？', {
            icon: 3,
            title: '友情提示',
            btn: ['确定','取消'] //按钮
        }, function(){

            $.getJSON(node_del_url, {id : nowNode.id},function(res){
                layer.close( index );
                if( 1 == res.status ){
                    $("#tree").empty();
                    getTree();
                    layer.msg(res.msg,{icon:1});
                }else{
                    layer.msg(res.msg,{icon:5});
                }
            });
        }, function(){

        });
    });


    // 添加节点
    var options = {
        beforeSubmit:showStart,
        success:showSuccess
    };

    $('#addForm').submit(function(){
        $(this).ajaxSubmit(options);
        return false;
    });

    // 编辑节点
    $('#editForm').submit(function(){
        $(this).ajaxSubmit(options);
        return false;
    });
});

function getTree(){
    layui.use(['tree', 'layer'], function(){
        var layer = layui.layer;

        $.getJSON("<?php echo url('node/index'); ?>", function(res){
            if(111 == res.code){
                window.location.reload();
            }
            layui.tree({
                elem: '#tree'
                ,nodes: res.data
                ,click: function(node){

                    layui.use('layer', function(){
                        box = layer.open({
                            type: 1,
                            title: '您要如何操作该节点',
                            anim: 2,
                            skin: 'layui-layer-molv', //加上边框
                            area: ['400px', '150px'], //宽高
                            content: $('#ask_box')
                        });
                    });

                    nowNode = node;
                }
            });
        });
    });
}

// 添加相关的 js
var index = '';
function showStart(){
    index = layer.load(0, {shade: false});
    return true;
}

function showSuccess(res){
    layui.use('layer', function(){
        var layer = layui.layer;

        layer.ready(function(){
            layer.close( index );
            layer.close( box );
            if( 1 == res.status ){ //成功
                $("#node_name").val('');
                $("#route").val('');
                $("#tree").empty();
                getTree();
                layer.msg(res.msg,{icon:1},function(){
                    parent.location.reload();
                });
            }else{
                layer.msg(res.msg, {icon:5});
            }
        });
    });
}

</script>
</body>
</html>