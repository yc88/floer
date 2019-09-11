(function (g) {
    g.UploadImages = function ($box) {
        $box = $($box).eq(0);
        var $previews = $box.find(".preview"),
            $preview,
            $iframe,
            $input,
            len = $previews.length,
            doms = [],
            i = 0,
            doc,
            iframeCode = function (action) {
                return ['<!DOCTYPE html>',
                    '<html lang="en">',
                    '<head>',
                    '<meta charset="UTF-8">',
                    '<style>',
                    'html, body ,form, label {',
                    'margin: 0;',
                    'width: 100%;',
                    'height: 100%;',
                    'display: block;',
                    'filter:alpha(opacity=0);',
                    '}',
                    'input {',
                    'position: absolute;',
                    'top: -99999px;',
                    '}',
                    '</style>',
                    '</head>',
                    '<body>',
                    '<form action="', action, '" id="form" method="post" enctype="multipart/form-data">',
                    '<label for="img"><input type="file" id="img" name="img" accept=".jpg,.png,.bmp,.gif,.jpeg"/></label>',
                    '</form>',
                    '<script>',
                    'var def = true;',
                    'document.getElementById("img").onchange = function () {',
                    'document.getElementById("form").submit();',
                    'def = false;',
                    '};',
                    '</script>',
                    '</body>',
                    '</html>'].join("");
            };
        for (; i < len; i++) {
            $preview = $previews.eq(i).append('<iframe frameborder="0"></iframe><span class="close" data-index="' + i + '"></span>');
            $iframe = $preview.find("iframe");
            doc = $iframe[0].contentWindow.document;
            doc.open();
            $input = $preview.find("input");
            doc.write(iframeCode($preview.data('action')));
            doc.close();
            doms.push({
                'preview': $preview,
                'iframe': $iframe,
                'input': $input,
                'close': $preview.find(".close"),
                'img': $preview.find(".show")
            });
            if ($input.val()) {
                setSrc(i, {
                    'value': $input.val(),
                    'view': $input.data('view')
                })
            }
            $iframe.on("load", (function (i) {
                return function () {
                    var $iframe = doms[i].iframe,
                        iframeWindow = $iframe[0].contentWindow,
                        doc = iframeWindow.document;
                    if (!iframeWindow.def) {
                        setSrc(i, $.parseJSON(iframeWindow.document.body.innerHTML));
                        doc.body.innerHTML = "";
                        doc.open();
                        doc.write(iframeCode($previews.eq(i).data("action")));
                        doc.close();
                    }
                }
            })(i));
        }
        $box.on("click", (function (e) {
            var $t = $(e.target),
                index;
            if ($t.hasClass("close")) {
                e.preventDefault();
                index = $t.data("index");
                doms[index].img.removeAttr("src").hide();
                doms[index].close.css("display", "none");
                doms[index].input.val("");
            }
        }));
        function setSrc(i, img) {
            doms[i].img.attr('src',img.view).show();
            doms[i].close.css("display", "block");
            doms[i].input.val(img.value);
        }
    };
})(window);
