function checkPhone() {
    return navigator.platform.indexOf('Mac') === navigator.platform.indexOf('Win') &&
        navigator.maxTouchPoints &&
        2 < navigator.maxTouchPoints
}
var APP = (function () {

    var fn = {

        // 生成短地址
        setUrl: function (self) {
            document.activeElement.blur();
            var urlEl = document.getElementById('url'),
                tips = '请输入您的长网址，如 https://www.taobao.com',
                request = {
                    "url": urlEl.value
                };
            fn.getJson('api/shorten', true, JSON.stringify(request), function (res) {
                if (res.success == true) {
                    urlEl.className = 'focus';
                    urlEl.value = '';
                    document.getElementById("dwz").innerHTML = res.content.url;
                    document.getElementById("dwz").href = res.content.url;
                    document.getElementById("qrcode").src = `https://api.chenyeah.com/v1/qr?text=${res.content.url}`;
                    document.getElementById("result").style.display = 'flex';
                } else {
                    urlEl.className = '';
                    urlEl.value = '';
                    if (checkPhone()) {
                        alert(res.content);
                    } else {
                        $toast(res.content);
                    }

                    urlEl.setAttribute('placeholder', tips);
                }
            });
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
        }

    },

        init = function () {
            setTimeout(function () {
                var el = document.getElementsByTagName('html')[0];
                el.className = 'on';
            }, 10);
        };

    return {
        fn: fn,
        init: init
    }

})();
document.addEventListener('DOMContentLoaded', function () {
    APP.init();
})