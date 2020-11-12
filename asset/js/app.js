
var APP = (function () {

    var fn = {

        // 判断哪种提示方式
        toast: function (msg) {

            if (checkPhone()) {
                alert(msg);
            } else {
                $toast(msg);
            }
        },

        // 获取 JSON 数据
        getJson: function (url, post, data, callback) {
            var xhr = new XMLHttpRequest(),
                type = (post) ? 'POST' : 'GET';
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var json = JSON.parse(xhr.responseText);
                    callback(json);
                } else if (xhr.readyState == 4) {
                    callback(false);
                }
            }
            xhr.open(type, url, true);
            xhr.send(data);
        },

        // 生成短地址
        setUrl: function (self) {
            document.activeElement.blur();
            var urlEl = document.getElementById('url'),
                tips = '请输入您的长网址，如 https://www.taobao.com',
                request = {
                    "url": urlEl.value
                };
            fn.getJson('api/shorten.php', true, JSON.stringify(request), function (res) {
                if (res.success == true) {
                    urlEl.className = 'focus';
                    urlEl.value = '';

                    console.log(res)
                    document.getElementById("dwz").innerHTML = res.content.short_url;
                    document.getElementById("dwz").href = res.content.short_url;
                    document.getElementById("qrcode").src = res.content.qr_url;
                    document.getElementById("old-url").innerHTML = res.content.url;
                    document.getElementById("old-url").href = res.content.url;
                    document.getElementById("result").style.display = 'flex';
                } else {
                    urlEl.className = '';
                    urlEl.value = '';
                    fn.toast(res.content)
                    urlEl.setAttribute('placeholder', tips);
                }
            });
        },

        // 复制文本
        urlCopy: function () {
            const url = document.getElementById("dwz").innerHTML;
            if (textCopy(url)) {
                fn.toast('复制成功')
            } else {
                fn.toast('复制失败')
            }
        },
    }
    var init = function () {
        document.getElementById('copy-url').addEventListener("click", fn.urlCopy)
        console.log("%c ", "padding:110px 300px;background:url('https://cdn.jsdelivr.net/gh/cyea/distribute@master/gif/pkq.gif') no-repeat");
        console.log("恭喜你发现了这个彩蛋！！！")
    };

    return {
        fn: fn,
        init: init
    }
})();
document.addEventListener('DOMContentLoaded', function () {
    APP.init();
});