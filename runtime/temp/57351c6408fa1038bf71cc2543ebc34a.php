<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/data/www/floer/public/../application/admin/view/course/editcourse.html";i:1526012849;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑课程</title>
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
                    <span data-dv="file_p" class="btn btn-danger">图片上传</span>
                    <span data-dv="file_v" class="btn btn-danger">上传视频</span>
                    <!--<h5>编辑课程</h5>-->
                </div>
                <form class="form-horizontal m-t" id="commentForm" method="post" action="<?php echo url('course/editCourse'); ?>">
                <div class="ibox-content base_1" >
                        <input type="hidden" name="video" value="" id="video">
                        <input type="hidden" name="id" value="<?php echo $course['id']; ?>">
                 <div class="form-group">
                        <label class="col-sm-3 control-label">课程分类：</label>
                        <div class="input-group col-sm-4">
                            <select name="classify_id" id="" class="form-control">
                                <option value="">请选择</option>
                                <?php foreach($courseCate as $c): ?>
                                <option value="<?php echo $c['id']; ?>" <?php echo !empty($course['classify_id']) && $course['classify_id']==$c['id']?"selected":""; ?>><?php echo $c['classify_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                   </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">导师选择：</label>
                            <div class="input-group col-sm-4">
                                <select name="teacher_id" id="" class="form-control">
                                    <option value="">请选择</option>
                                    <?php foreach($teacher as $t): ?>
                                    <option value="<?php echo $t['id']; ?>" <?php echo !empty($course['teacher_id']) && $course['teacher_id']==$t['id']?"selected":""; ?>><?php echo $t['name_z']; ?>(<?php echo $t['name_y']; ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">课程名称：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" class="form-control" required="" aria-required="true" name="courser_name" value="<?php echo $course['courser_name']; ?>">
                            </div>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">开课时间：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})" id="logmin" class="form-control Wdate" style="width:120px;" name="startime" value="<?php echo date('Y-m-d',$course['begins_time']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">课程结束时间：</label>
                            <div class="input-group col-sm-7">
                                <input type="text" onfocus="WdatePicker({firstDayOfWeek:1})" id="logmin" class="form-control Wdate" style="width:120px;" name="endtime" value="<?php echo date('Y-m-d',$course['end_time']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">上课人数：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" class="form-control" required="" aria-required="true" name="courser_num" value="<?php echo $course['courser_num']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="input-group col-sm-4">
                               全额价格 <input type="text" class="form-control" required="" aria-required="true" name="courser_price" value="<?php echo $course['courser_price']; ?>">
                            </div>

                            <label class="col-sm-3 control-label">课程价格：</label>
                            <div class="input-group col-sm-4">
                            定&nbsp;&nbsp;&nbsp;金<input type="text" class="form-control" required="" aria-required="true" name="depoit_price" value="<?php echo $course['depoit_price']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">课程相关介绍：</label>
                            <div class="input-group col-sm-7">
                                <textarea  type="text/plain" id="answerDetail" name="courser_detail" class="textarea"><?php echo $course['courser_detail']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <h3>已有图片</h3>
                            <div class="formControls" style="margin-left: 46px;">
                                <?php if(is_array($course['imgarr']) || $course['imgarr'] instanceof \think\Collection || $course['imgarr'] instanceof \think\Paginator): $i = 0; $__LIST__ = $course['imgarr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <span class="img_span" data-id="<?php echo $course['id']; ?>">
                <img src="<?php echo getImgName($vo,600,600); ?>" onerror="this.src='__NoImg__'" style="width: 120px;height: 120px">
					<i class="Hui-iconfont-del_img layui-icon">&#xe640;</i>
                <input type="hidden" name="old_img_url[]" value="<?php echo $vo; ?>">
            </span>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label">课程相关图片：</label>
                                    <div class="uploader-list-container">
                                        <div class="queueList">
                                            <div id="dndArea" class="placeholder">
                                                <div id="filePicker-2"></div>
                                                <p >或将照片拖到这里，单次最多可选20张</p>
                                            </div>
                                        </div>
                                        <div class="statusBar" style="display:none;">
                                            <div class="progress"><span class="text">0%</span> <span
                                                    class="percentage"></span></div>
                                            <div class="info"></div>
                                            <div class="btns">
                                                <div id="filePicker2"></div>
                                                <div class="uploadBtn">开始上传</div>
                                            </div>
                                        </div>
                                    </div>
                            <div id="upload_img"></div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">是否发布：</label>
                        <div class="input-group col-sm-4">
                            是 <input  type="radio" name="is_publish" required="" checked aria-required="true" value="1" >
                            否 <input type="radio"  name="is_publish" required="" aria-required="true" value="2" >
                        </div>
                        </div>

                </div>
                    <div class="ibox-content base_2" >
                        <input type="hidden" name="complete_id" value="<?php echo $image_all['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">课程介绍：</label>
                            <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                <input name="course_detail_photo" value="" type="hidden" >
                                <div>
                                    <img style="display: inline;" src="<?php echo getImgName($image_all['course_detail_photo'],1200,600); ?>" onerror="this.src='__NoImg__'" class="show" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">你将学到：</label>
                                <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                    <input name="learn_photo" value="" type="hidden" >
                                    <div>
                                        <img style="display: inline;" src="<?php echo getImgName($image_all['learn_photo'],1200,600); ?>" onerror="this.src='__NoImg__'" class="show" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">课程大纲：</label>
                                <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                    <input name="course_photo" value="" type="hidden" >
                                    <div>
                                        <img style="display: inline;" src="<?php echo getImgName($image_all['course_photo'],1200,600); ?>" onerror="this.src='__NoImg__'" class="show" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导师简介：</label>
                                <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                    <input name="teacher_detail" value="" type="hidden" >
                                    <div>
                                        <img style="display: inline;" src="<?php echo getImgName($image_all['teacher_detail'],1200,600); ?>" onerror="this.src='__NoImg__'" class="show" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">学员作品照：</label>
                                <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                    <input name="production_photo" value="" type="hidden" >
                                    <div>
                                        <img style="display: inline;" src="<?php echo getImgName($image_all['production_photo'],1200,600); ?>" onerror="this.src='__NoImg__'" class="show" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">学员毕业证书：</label>
                                <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                    <input name="diploma_photo" value="" type="hidden" >
                                    <div>
                                        <img style="display: inline;" src="<?php echo getImgName($image_all['diploma_photo'],1200,600); ?>" onerror="this.src='__NoImg__'" class="show" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">学员毕业合照：</label>
                                <div class="preview portrait_edit" data-action="<?php echo url('Upload/upload_img'); ?>">
                                    <input name="graduation_photo" value="" type="hidden" >
                                    <div>
                                        <img style="display: inline;" src="<?php echo getImgName($image_all['graduation_photo'],1200,600); ?>" onerror="this.src='__NoImg__'" class="show" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="ibox-content base_3" >
                            <button type="button" class="layui-btn" id="test1">
                                <i class="layui-icon">&#xe67c;</i>上传视频
                            </button>
                        <div style="width:400px; margin-left: auto;" id="video_div">
                            <i class="Hui-iconfont-del layui-icon">&#xe640;</i>
                            <video id="my-video" class="video-js" controls preload="auto" width="740" height="400" data-setup="{}">
                                <source src="/static/video/<?php echo $course['video_url']; ?>" type="video/<?php echo !empty($course['video_type'])?$course['video_type'] : 'mp4'; ?>">
                            </video>
                        </div>
                </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-6" style="text-align: left;margin-right: 400px;">
                            <input type="button" value="返回" class="btn btn-danger"onclick="javascript :history.back(-1);"/>
                            <button class="btn btn-primary" type="submit">提交</button>
                        </div>
                    </div>
                </form>
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

<link rel="stylesheet" type="text/css" href="/static/webuploader/0.1.5/webuploader.css"/><!--图上传css-->
<script type="text/javascript" src="/static/webuploader/0.1.5/webuploader.min.js"></script>
<!--相册-->
<script type="text/javascript">
    (function ($) {
        // 当domReady的时候开始初始化
        $(function () {
            var $wrap = $('.uploader-list-container'),

            // 图片容器
                    $queue = $('<ul class="filelist"></ul>')
                            .appendTo($wrap.find('.queueList')),

            // 状态栏，包括进度和控制按钮
                    $statusBar = $wrap.find('.statusBar'),

            // 文件总体选择信息。
                    $info = $statusBar.find('.info'),

            // 上传按钮
                    $upload = $wrap.find('.uploadBtn'),

            // 没选择文件之前的内容。
                    $placeHolder = $wrap.find('.placeholder'),

                    $progress = $statusBar.find('.progress').hide(),

            // 添加的文件数量
                    fileCount = 0,

            // 添加的文件总大小
                    fileSize = 0,

            // 优化retina, 在retina下这个值是2
                    ratio = window.devicePixelRatio || 1,

            // 缩略图大小
                    thumbnailWidth = 110 * ratio,
                    thumbnailHeight = 110 * ratio,

            // 可能有pedding, ready, uploading, confirm, done.
                    state = 'pedding',

            // 所有文件的进度信息，key为file id
                    percentages = {},
            // 判断浏览器是否支持图片的base64
                    isSupportBase64 = (function () {
                        var data = new Image();
                        var support = true;
                        data.onload = data.onerror = function () {
                            if (this.width != 1 || this.height != 1) {
                                support = false;
                            }
                        }
                        data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                        return support;
                    })(),

            // 检测是否已经安装flash，检测flash的版本
                    flashVersion = (function () {
                        var version;

                        try {
                            version = navigator.plugins['Shockwave Flash'];
                            version = version.description;
                        } catch (ex) {
                            try {
                                version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                                        .GetVariable('$version');
                            } catch (ex2) {
                                version = '0.0';
                            }
                        }
                        version = version.match(/\d+/g);
                        return parseFloat(version[0] + '.' + version[1], 10);
                    })(),

                    supportTransition = (function () {
                        var s = document.createElement('p').style,
                                r = 'transition' in s ||
                                        'WebkitTransition' in s ||
                                        'MozTransition' in s ||
                                        'msTransition' in s ||
                                        'OTransition' in s;
                        s = null;
                        return r;
                    })(),

            // WebUploader实例
                    uploader;
            // 实例化
            uploader = WebUploader.create({
                pick: {
                    id: '#filePicker-2',
                    label: '点击选择图片'
                },
                formData: {
                    uid: 123
                },
                dnd: '#dndArea',
                paste: '#uploader',
                swf: '__PUBLIC__/Uploader.swf',
                chunked: false,
                chunkSize: 512 * 1024,
                server: "<?php echo url('upload/courser_img'); ?>",
                // runtimeOrder: 'flash',

                // accept: {
                //     title: 'Images',
                //     extensions: 'gif,jpg,jpeg,bmp,png',
                //     mimeTypes: 'image'
                // },

                // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
                disableGlobalDnd: true,
                fileNumLimit: 5, //图片张数限制
                fileSizeLimit: 200 * 1024 * 1024,    // 200 M
                fileSingleSizeLimit: 50 * 1024 * 1024    // 50 M
            });
            //成功回调
            uploader.on('uploadSuccess', function (file, data) {
                var html = '<input type="hidden" name="courser_img[]" value="' + data.value + '">';
                $('#upload_img').append(html);
                //console.info(data );
            });

            // 拖拽时不接受 js, txt 文件。
            uploader.on('dndAccept', function (items) {
                var denied = false,
                        len = items.length,
                        i = 0,
                // 修改js类型
                        unAllowed = 'text/plain;application/javascript ';

                for (; i < len; i++) {
                    // 如果在列表里面
                    if (~unAllowed.indexOf(items[i].type)) {
                        denied = true;
                        break;
                    }
                }

                return !denied;
            });

            uploader.on('dialogOpen', function () {
                console.log('here');
            });

            // uploader.on('filesQueued', function() {
            //     uploader.sort(function( a, b ) {
            //         if ( a.name < b.name )
            //           return -1;
            //         if ( a.name > b.name )
            //           return 1;
            //         return 0;
            //     });
            // });

            // 添加“添加文件”的按钮，
            uploader.addButton({
                id: '#filePicker2',
                label: '继续添加'
            });

            uploader.on('ready', function () {
                window.uploader = uploader;
            });

            // 当有文件添加进来时执行，负责view的创建
            function addFile(file) {
                var $li = $('<li id="' + file.id + '">' +
                                '<p class="title">' + file.name + '</p>' +
                                '<p class="imgWrap"></p>' +
                                '<p class="progress"><span></span></p>' +
                                '</li>'),

                        $btns = $('<div class="file-panel">' +
                                '<span class="cancel">删除</span>' +
                                '<span class="rotateRight">向右旋转</span>' +
                                '<span class="rotateLeft">向左旋转</span></div>').appendTo($li),
                        $prgress = $li.find('p.progress span'),
                        $wrap = $li.find('p.imgWrap'),
                        $info = $('<p class="error"></p>'),

                        showError = function (code) {
                            switch (code) {
                                case 'exceed_size':
                                    text = '文件大小超出';
                                    break;

                                case 'interrupt':
                                    text = '上传暂停';
                                    break;

                                default:
                                    text = '上传失败，请重试';
                                    break;
                            }

                            $info.text(text).appendTo($li);
                        };

                if (file.getStatus() === 'invalid') {
                    showError(file.statusText);
                } else {
                    // @todo lazyload
                    $wrap.text('预览中');
                    uploader.makeThumb(file, function (error, src) {
                        var img;

                        if (error) {
                            $wrap.text('不能预览');
                            return;
                        }

                        if (isSupportBase64) {
                            img = $('<img src="' + src + '">');
                            $wrap.empty().append(img);
                        } else {
                            $.ajax('__PUBLIC__/server/preview.php', {
                                method: 'POST',
                                data: src,
                                dataType: 'json'
                            }).done(function (response) {
                                if (response.result) {
                                    img = $('<img src="' + response.result + '">');
                                    $wrap.empty().append(img);
                                } else {
                                    $wrap.text("预览出错");
                                }
                            });
                        }
                    }, thumbnailWidth, thumbnailHeight);

                    percentages[file.id] = [file.size, 0];
                    file.rotation = 0;
                }

                file.on('statuschange', function (cur, prev) {
                    if (prev === 'progress') {
                        $prgress.hide().width(0);
                    } else if (prev === 'queued') {
                        $li.off('mouseenter mouseleave');
                        $btns.remove();
                    }

                    // 成功
                    if (cur === 'error' || cur === 'invalid') {
                        console.log(file.statusText);
                        showError(file.statusText);
                        percentages[file.id][1] = 1;
                    } else if (cur === 'interrupt') {
                        showError('interrupt');
                    } else if (cur === 'queued') {
                        percentages[file.id][1] = 0;
                    } else if (cur === 'progress') {
                        $info.remove();
                        $prgress.css('display', 'block');
                    } else if (cur === 'complete') {
                        $li.append('<span class="success"></span>');
                    }

                    $li.removeClass('state-' + prev).addClass('state-' + cur);
                });

                $li.on('mouseenter', function () {
                    $btns.stop().animate({height: 30});
                });

                $li.on('mouseleave', function () {
                    $btns.stop().animate({height: 0});
                });

                $btns.on('click', 'span', function () {
                    var index = $(this).index(),
                            deg;

                    switch (index) {
                        case 0:
                            uploader.removeFile(file);
                            return;

                        case 1:
                            file.rotation += 90;
                            break;

                        case 2:
                            file.rotation -= 90;
                            break;
                    }

                    if (supportTransition) {
                        deg = 'rotate(' + file.rotation + 'deg)';
                        $wrap.css({
                            '-webkit-transform': deg,
                            '-mos-transform': deg,
                            '-o-transform': deg,
                            'transform': deg
                        });
                    } else {
                        $wrap.css('filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (~~((file.rotation / 90) % 4 + 4) % 4) + ')');
                        // use jquery animate to rotation
                        // $({
                        //     rotation: rotation
                        // }).animate({
                        //     rotation: file.rotation
                        // }, {
                        //     easing: 'linear',
                        //     step: function( now ) {
                        //         now = now * Math.PI / 180;

                        //         var cos = Math.cos( now ),
                        //             sin = Math.sin( now );

                        //         $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
                        //     }
                        // });
                    }


                });

                $li.appendTo($queue);
            }

            // 负责view的销毁
            function removeFile(file) {
                var $li = $('#' + file.id);

                delete percentages[file.id];
                updateTotalProgress();
                $li.off().find('.file-panel').off().end().remove();
            }

            function updateTotalProgress() {
                var loaded = 0,
                        total = 0,
                        spans = $progress.children(),
                        percent;

                $.each(percentages, function (k, v) {
                    total += v[0];
                    loaded += v[0] * v[1];
                });

                percent = total ? loaded / total : 0;


                spans.eq(0).text(Math.round(percent * 100) + '%');
                spans.eq(1).css('width', Math.round(percent * 100) + '%');
                updateStatus();
            }

            function updateStatus() {
                var text = '', stats;

                if (state === 'ready') {
                    text = '选中' + fileCount + '张图片，共' +
                            WebUploader.formatSize(fileSize) + '。';
                } else if (state === 'confirm') {
                    stats = uploader.getStats();
                    if (stats.uploadFailNum) {
                        text = '已成功上传' + stats.successNum + '张照片至XX相册，' +
                                stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
                    }

                } else {
                    stats = uploader.getStats();
                    text = '共' + fileCount + '张（' +
                            WebUploader.formatSize(fileSize) +
                            '），已上传' + stats.successNum + '张';

                    if (stats.uploadFailNum) {
                        text += '，失败' + stats.uploadFailNum + '张';
                    }
                }

                $info.html(text);
            }

            function setState(val) {
                var file, stats;

                if (val === state) {
                    return;
                }

                $upload.removeClass('state-' + state);
                $upload.addClass('state-' + val);
                state = val;

                switch (state) {
                    case 'pedding':
                        $placeHolder.removeClass('element-invisible');
                        $queue.hide();
                        $statusBar.addClass('element-invisible');
                        uploader.refresh();
                        break;

                    case 'ready':
                        $placeHolder.addClass('element-invisible');
                        $('#filePicker2').removeClass('element-invisible');
                        $queue.show();
                        $statusBar.removeClass('element-invisible');
                        uploader.refresh();
                        break;

                    case 'uploading':
                        $('#filePicker2').addClass('element-invisible');
                        $progress.show();
                        $upload.text('暂停上传');
                        break;

                    case 'paused':
                        $progress.show();
                        $upload.text('继续上传');
                        break;

                    case 'confirm':
                        $progress.hide();
                        $('#filePicker2').removeClass('element-invisible');
                        $upload.text('开始上传');

                        stats = uploader.getStats();
                        if (stats.successNum && !stats.uploadFailNum) {
                            setState('finish');
                            return;
                        }
                        break;
                    case 'finish':
                        stats = uploader.getStats();
                        if (stats.successNum) {
                            layer.msg('上传成功');
                        } else {
                            // 没有成功的图片，重设
                            state = 'done';
                            location.reload();
                        }
                        break;
                }

                updateStatus();
            }

            uploader.onUploadProgress = function (file, percentage) {
                var $li = $('#' + file.id),
                        $percent = $li.find('.progress span');

                $percent.css('width', percentage * 100 + '%');
                percentages[file.id][1] = percentage;
                updateTotalProgress();
            };

            uploader.onFileQueued = function (file) {
                fileCount++;
                fileSize += file.size;

                if (fileCount === 1) {
                    $placeHolder.addClass('element-invisible');
                    $statusBar.show();
                }

                addFile(file);
                setState('ready');
                updateTotalProgress();
            };

            uploader.onFileDequeued = function (file) {
                fileCount--;
                fileSize -= file.size;

                if (!fileCount) {
                    setState('pedding');
                }

                removeFile(file);
                updateTotalProgress();

            };

            uploader.on('all', function (type) {
                var stats;
                switch (type) {
                    case 'uploadFinished':
                        setState('confirm');
                        break;

                    case 'startUpload':
                        setState('uploading');
                        break;

                    case 'stopUpload':
                        setState('paused');
                        break;

                }
            });

            uploader.onError = function (code) {
                alert('Eroor: ' + code);
            };

            $upload.on('click', function () {
                if ($(this).hasClass('disabled')) {
                    return false;
                }

                if (state === 'ready') {
                    uploader.upload();
                } else if (state === 'paused') {
                    uploader.upload();
                } else if (state === 'uploading') {
                    uploader.stop();
                }
            });

            $info.on('click', '.retry', function () {
                uploader.retry();
            });

            $info.on('click', '.ignore', function () {
                alert('todo');
            });

            $upload.addClass('state-' + state);
            updateTotalProgress();
        });

    })(jQuery);
</script>

<script type="text/javascript">
    //相册删除
    $('.Hui-iconfont-del_img').on('click', function () {
        var id = $(this).parent().data('id'),
                val = $(this).siblings('input').val(),
                $this = $(this);
        layer.confirm('确定要删除吗？', function () {
            $.post("<?php echo url('upload/ajax_del_img'); ?>", {id: id, courser_img: val}, function (data) {
                if (data.status == 0) {
                    layer.msg(data.msg, {icon: 5});
                    return false;
                } else {
                    layer.msg(data.msg, {icon: 6}, function () {
                        $this.parents("span").remove();
                    });
                }
            })
        })

    });
</script>
<script type="text/javascript">
    var source = $("#video_div video source"),
            video_div = $("#video_div"),
            hidden_video = $('#video');
//    video_div.hide();
    layui.use('upload', function(){
        var upload = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#test1' //绑定元素
            ,accept:'video'
            ,size : '10200'
            ,url: "<?php echo url('upload/up_video'); ?>" //上传接口
            ,done: function(res, index, upload){
                var url = '/static/video/',host = 'http://www.floertp.com';
                if(res.status == 1){
                    var move_url = res.msg; // 视频上传路径 20180418/5bb524f2de57551cea94a0a7435cbfdb.mp4
                    var move_type = move_url.split('.');
                    var  new_move_type =move_type[move_type.length-1]; //视频格式 mp4
                    hidden_video.val(res.msg);
                    source.attr('src',host+url+move_url);
                    source.attr('type','video/'+new_move_type);
                    if(source.attr('src')){
                        $("#video_div").show();
                        var myPlayer = videojs('my-video');
                        myPlayer.src(source.attr('src'));  //重置video的src
                        myPlayer.load(source.attr('src'));  //使video重新加载
                        myPlayer.play();
                    }
                    layer.msg('上传成功',{icon:1});
                }else{
                    hidden.val('');
                    layer.msg(res.msg,{icon:5});
                }
                //上传完毕回调
            }
            ,error: function(){
                //请求异常回调
            }
        });
    });
    //删除视频
    $('.Hui-iconfont-del').on('click', function () {
        var val = hidden_video.val();
        layer.confirm('确定要删除吗？', function () {
            $.post("<?php echo url('upload/ajax_del_video'); ?>", { url_vi: val}, function (data) {
                if (data.status == 0) {
                    layer.msg(data.msg, {icon: 5});
                    return false;
                } else {
                    layer.msg(data.msg, {icon: 6}, function () {
                        hidden_video.val('');
                        video_div.hide();
                    });
                }
            })
        })

    });
</script>
<script type="text/javascript">
    $('.base_2').hide();
    $('.base_3').hide();
    $('.ibox-title span').on('click',function(){
        var  data = $(this).data('dv');
        if(data == 'base'){
            $('.base_2').hide();
            $('.base_3').hide();
            $('.base_1').show();
        }else if(data == 'file_p'){
            $('.base_2').show();
            $('.base_1').hide();
            $('.base_3').hide();
        }else if(data == 'file_v'){
            $('.base_3').show();
            $('.base_1').hide();
            $('.base_2').hide();
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
