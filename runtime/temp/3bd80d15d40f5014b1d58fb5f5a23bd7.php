<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wwwroot\floer\public/../application/admin\view\order\addresidue.html";i:1526289776;}*/ ?>
<link rel="stylesheet" href="__PUBLIC__/Home/css/buynow.css">
<script src="__PUBLIC__/Home/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/lib/layer/2.4/layer.js"></script>
<form action="" id="add_address" method="post" >
    <input type="hidden" id="old_province" value="<?php echo $data['p_id']; ?>">
    <input type="hidden" id="old_city" value="<?php echo $data['c_id']; ?>">
    <input type="hidden" id="old_block" value="<?php echo $data['b_id']; ?>">
    <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
    <dl class="dialog-address" data-id="11">
        <dd>收获人姓名：<input type="text"  name="name" value="<?php echo $data['name']; ?>"  class="com_name"/></dd>
        <dd>手机号码：<input type="text" name="phone" value="<?php echo $data['phone']; ?>"/></dd>
        <dd>所在区域：
            <select class="select" id="province" name="p_id"><option value="">-请选择省-</option></select>
            <select class="select" id="city" name="c_id"><option value="">-请选择市-</option></select>
            <select class="select" id="block" name="b_id"><option value="">-请选择县-</option></select>
        </dd>
        <dd>详细地址：<input type="text" name="address" value="<?php echo $data['address']; ?>"/></dd>
        <dd>邮编：<input type="text" name="zip" value="<?php echo $data['zip']; ?>"/></dd>
    </dl>
</form>
<script type='text/javascript' src='__PUBLIC__/Home/js/address.js'></script>
