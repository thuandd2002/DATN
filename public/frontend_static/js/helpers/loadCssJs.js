export var loadCss = function (href) {
    var cb = function () {
        var l = document.createElement('link');
        l.rel = "stylesheet";
        l.href = href;
        var h = document.getElementsByTagName('head')[0];
        h.append(l);
    };

    var raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;
    if (raf) {
        raf(cb);
    } else {
        window.addEventListener('load', cb);
    }
};

export var loadJs = function (src) {
    var cb = function () {
        var e = document.createElement('script');
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        e.async = true;

        if (document.getElementById('fb-root') !== null )
        {
            document.getElementById('fb-root').appendChild(e);
        }

    };

    var raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;

    if (raf)
    {
        raf(cb);
    }
    else
    {
        window.addEventListener('load', cb);
    }
};