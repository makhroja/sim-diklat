/*!
 * github-buttons v2.14.0
 * (c) 2020 なつき
 * @license BSD-2-Clause
 */
! function() {
    "use strict";
    var e = window.document,
        t = e.location,
        o = window.Math,
        r = window.HTMLElement,
        a = window.XMLHttpRequest,
        n = "https://buttons.github.io/buttons.html",
        i = "github.com",
        l = a && "prototype" in a && "withCredentials" in a.prototype,
        c = l && r && "attachShadow" in r.prototype && !("prototype" in r.prototype.attachShadow),
        d = function(e, t, o, r) {
            null == t && (t = "&"), null == o && (o = "="), null == r && (r = window.decodeURIComponent);
            for (var a = {}, n = e.split(t), i = 0, l = n.length; i < l; i++) {
                var c = n[i];
                if ("" !== c) {
                    var d = c.split(o);
                    a[r(d[0])] = null != d[1] ? r(d.slice(1).join(o)) : void 0
                }
            }
            return a
        },
        s = function(e, t, o) { e.addEventListener ? e.addEventListener(t, o, !1) : e.attachEvent("on" + t, o) },
        h = function(e, t, o) { e.removeEventListener ? e.removeEventListener(t, o, !1) : e.detachEvent("on" + t, o) },
        f = function(e, t, o) {
            var r = function() { return h(e, t, r), o.apply(this, arguments) };
            s(e, t, r)
        },
        u = function(e, t, o) {
            var r = function() { if (t.test(e.readyState)) return h(e, "readystatechange", r), o.apply(this, arguments) };
            s(e, "readystatechange", r)
        },
        g = function(e) {
            return function(t, o, r) {
                var a = e.createElement(t);
                if (null != o)
                    for (var n in o) {
                        var i = o[n];
                        null != i && (null != a[n] ? a[n] = i : a.setAttribute(n, i))
                    }
                if (null != r)
                    for (var l = 0, c = r.length; l < c; l++) {
                        var d = r[l];
                        a.appendChild("string" == typeof d ? e.createTextNode(d) : d)
                    }
                return a
            }
        },
        p = g(e),
        b = function(e) { var t; return function() { t || (t = 1, e.apply(this, arguments)) } },
        v = function(e, t) { return {}.hasOwnProperty.call(e, t) },
        m = function(e) { return ("" + e).toLowerCase() },
        w = { light: ".btn{color:#24292e;background-color:#eff3f6;border-color:#c5c9cc;border-color:rgba(27,31,35,.2);background-image:url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg'%3e%3clinearGradient id='o' x2='0' y2='1'%3e%3cstop stop-color='%23fafbfc'/%3e%3cstop offset='90%25' stop-color='%23eff3f6'/%3e%3c/linearGradient%3e%3crect width='100%25' height='100%25' fill='url(%23o)'/%3e%3c/svg%3e\");background-image:-moz-linear-gradient(top, #fafbfc, #eff3f6 90%);background-image:linear-gradient(180deg, #fafbfc, #eff3f6 90%);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr='#FFFAFBFC', endColorstr='#FFEEF2F5')}:root .btn{filter:none}.btn:focus,.btn:hover{background-color:#e6ebf1;background-position:-0.5em;border-color:#9fa4a9;border-color:rgba(27,31,35,.35);background-image:url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg'%3e%3clinearGradient id='o' x2='0' y2='1'%3e%3cstop stop-color='%23f0f3f6'/%3e%3cstop offset='90%25' stop-color='%23e6ebf1'/%3e%3c/linearGradient%3e%3crect width='100%25' height='100%25' fill='url(%23o)'/%3e%3c/svg%3e\");background-image:-moz-linear-gradient(top, #f0f3f6, #e6ebf1 90%);background-image:linear-gradient(180deg, #f0f3f6, #e6ebf1 90%);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr='#FFF0F3F6', endColorstr='#FFE5EAF0')}:root .btn:focus,:root .btn:hover{filter:none}.btn:active{background-color:#e9ecef;border-color:#a1a4a8;border-color:rgba(27,31,35,.35);box-shadow:inset 0 .15em .3em rgba(27,31,35,.15);background-image:none;filter:none}.social-count{color:#24292e;background-color:#fff;border-color:#d1d2d3;border-color:rgba(27,31,35,.2)}.social-count:focus,.social-count:hover{color:#0366d6}.octicon-heart{color:#ea4aaa}", dark: ".btn{color:#fafbfc;background-color:#202428;border-color:#1f2327;border-color:rgba(27,31,35,.2);background-image:url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg'%3e%3clinearGradient id='o' x2='0' y2='1'%3e%3cstop stop-color='%232f363d'/%3e%3cstop offset='90%25' stop-color='%23202428'/%3e%3c/linearGradient%3e%3crect width='100%25' height='100%25' fill='url(%23o)'/%3e%3c/svg%3e\");background-image:-moz-linear-gradient(top, #2f363d, #202428 90%);background-image:linear-gradient(180deg, #2f363d, #202428 90%);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr='#FF2F363D', endColorstr='#FF1E2226')}:root .btn{filter:none}.btn:focus,.btn:hover{background-color:#1b1f23;background-position:-0.5em;border-color:#1b1f23;border-color:rgba(27,31,35,.5);background-image:url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg'%3e%3clinearGradient id='o' x2='0' y2='1'%3e%3cstop stop-color='%232b3137'/%3e%3cstop offset='90%25' stop-color='%231b1f23'/%3e%3c/linearGradient%3e%3crect width='100%25' height='100%25' fill='url(%23o)'/%3e%3c/svg%3e\");background-image:-moz-linear-gradient(top, #2b3137, #1b1f23 90%);background-image:linear-gradient(180deg, #2b3137, #1b1f23 90%);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr='#FF2B3137', endColorstr='#FF191D21')}:root .btn:focus,:root .btn:hover{filter:none}.btn:active{background-color:#181b1f;border-color:#1a1d21;border-color:rgba(27,31,35,.5);box-shadow:inset 0 .15em .3em rgba(27,31,35,.15);background-image:none;filter:none}.social-count{color:#fafbfc;background-color:#1b1f23;border-color:#1b1f23;border-color:rgba(27,31,35,.2)}.social-count:focus,.social-count:hover{color:#2188ff}.octicon-heart{color:#ec6cb9}" },
        x = function(e, t) { return "@media(prefers-color-scheme:" + e + "){" + w[v(w, t) ? t : e] + "}" },
        y = { "mark-github": { heights: { 16: { width: 16, path: '<path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>' } } }, heart: { heights: { 16: { width: 16, path: '<path fill-rule="evenodd" d="M4.25 2.5c-1.336 0-2.75 1.164-2.75 3 0 2.15 1.58 4.144 3.365 5.682A20.565 20.565 0 008 13.393a20.561 20.561 0 003.135-2.211C12.92 9.644 14.5 7.65 14.5 5.5c0-1.836-1.414-3-2.75-3-1.373 0-2.609.986-3.029 2.456a.75.75 0 01-1.442 0C6.859 3.486 5.623 2.5 4.25 2.5zM8 14.25l-.345.666-.002-.001-.006-.003-.018-.01a7.643 7.643 0 01-.31-.17 22.075 22.075 0 01-3.434-2.414C2.045 10.731 0 8.35 0 5.5 0 2.836 2.086 1 4.25 1 5.797 1 7.153 1.802 8 3.02 8.847 1.802 10.203 1 11.75 1 13.914 1 16 2.836 16 5.5c0 2.85-2.045 5.231-3.885 6.818a22.08 22.08 0 01-3.744 2.584l-.018.01-.006.003h-.002L8 14.25zm0 0l.345.666a.752.752 0 01-.69 0L8 14.25z"></path>' } } }, eye: { heights: { 16: { width: 16, path: '<path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path>' } } }, star: { heights: { 16: { width: 16, path: '<path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>' } } }, "repo-forked": { heights: { 16: { width: 16, path: '<path fill-rule="evenodd" d="M5 3.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm0 2.122a2.25 2.25 0 10-1.5 0v.878A2.25 2.25 0 005.75 8.5h1.5v2.128a2.251 2.251 0 101.5 0V8.5h1.5a2.25 2.25 0 002.25-2.25v-.878a2.25 2.25 0 10-1.5 0v.878a.75.75 0 01-.75.75h-4.5A.75.75 0 015 6.25v-.878zm3.75 7.378a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm3-8.75a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>' } } }, "repo-template": { heights: { 16: { width: 16, path: '<path fill-rule="evenodd" d="M6 .75A.75.75 0 016.75 0h2.5a.75.75 0 010 1.5h-2.5A.75.75 0 016 .75zm5 0a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0V1.5h-.75A.75.75 0 0111 .75zM4.992.662a.75.75 0 01-.636.848c-.436.063-.783.41-.846.846a.75.75 0 01-1.485-.212A2.501 2.501 0 014.144.025a.75.75 0 01.848.637zM2.75 4a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 012.75 4zm10.5 0a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5a.75.75 0 01.75-.75zM2.75 8a.75.75 0 01.75.75v.268A1.72 1.72 0 013.75 9h.5a.75.75 0 010 1.5h-.5a.25.25 0 00-.25.25v.75c0 .28.114.532.3.714a.75.75 0 01-1.05 1.072A2.495 2.495 0 012 11.5V8.75A.75.75 0 012.75 8zm10.5 0a.75.75 0 01.75.75v4.5a.75.75 0 01-.75.75h-2.5a.75.75 0 010-1.5h1.75v-2h-.75a.75.75 0 010-1.5h.75v-.25a.75.75 0 01.75-.75zM6 9.75A.75.75 0 016.75 9h2.5a.75.75 0 010 1.5h-2.5A.75.75 0 016 9.75zm-1 2.5v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>' } } }, "issue-opened": { heights: { 16: { width: 16, path: '<path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm9 3a1 1 0 11-2 0 1 1 0 012 0zm-.25-6.25a.75.75 0 00-1.5 0v3.5a.75.75 0 001.5 0v-3.5z"></path>' } } }, download: { heights: { 16: { width: 16, path: '<path fill-rule="evenodd" d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path>' } } } },
        k = function(e, t) {
            e = m(e).replace(/^octicon-/, ""), v(y, e) || (e = "mark-github");
            var o = t >= 24 && 24 in y[e].heights ? 24 : 16,
                r = y[e].heights[o];
            return '<svg viewBox="0 0 ' + r.width + " " + o + '" width="' + t * r.width / o + '" height="' + t + '" class="octicon octicon-' + e + '" aria-hidden="true">' + r.path + "</svg>"
        },
        z = {},
        C = function(e, t) {
            var o = z[e] || (z[e] = []);
            if (!(o.push(t) > 1)) {
                var r = b((function() { for (delete z[e]; t = o.shift();) t.apply(null, arguments) }));
                if (l) {
                    var n = new a;
                    s(n, "abort", r), s(n, "error", r), s(n, "load", (function() {
                        var e;
                        try { e = JSON.parse(this.responseText) } catch (e) { return void r(e) }
                        r(200 !== this.status, e)
                    })), n.open("GET", e), n.send()
                } else {
                    var i = this || window;
                    i._ = function(e) { i._ = null, r(200 !== e.meta.status, e.data) };
                    var c = g(i.document)("script", { async: !0, src: e + (-1 !== e.indexOf("?") ? "&" : "?") + "callback=_" }),
                        d = function() { i._ && i._({ meta: {} }) };
                    s(c, "load", d), s(c, "error", d), c.readyState && u(c, /de|m/, d), i.document.getElementsByTagName("head")[0].appendChild(c)
                }
            }
        },
        F = function(e, t, o) {
            var r = g(e.ownerDocument),
                a = e.appendChild(r("style", { type: "text/css" })),
                n = "body{margin:0}a{text-decoration:none;outline:0}.widget{display:inline-block;overflow:hidden;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif;font-size:0;line-height:0;white-space:nowrap}.btn,.social-count{position:relative;display:inline-block;height:14px;padding:2px 5px;font-size:11px;font-weight:600;line-height:14px;vertical-align:bottom;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-repeat:repeat-x;background-position:-1px -1px;background-size:110% 110%;border:1px solid}.btn{border-radius:.25em}.btn:not(:last-child){border-radius:.25em 0 0 .25em}.social-count{border-left:0;border-radius:0 .25em .25em 0}.widget-lg .btn,.widget-lg .social-count{height:20px;padding:3px 10px;font-size:12px;line-height:20px}.octicon{display:inline-block;vertical-align:text-top;fill:currentColor}" + function(e) { if (null == e) return w.light; if (v(w, e)) return w[e]; var t = d(e, ";", ":", (function(e) { return e.replace(/^[ \t\n\f\r]+|[ \t\n\f\r]+$/g, "") })); return w[v(w, t["no-preference"]) ? t["no-preference"] : "light"] + x("light", t.light) + x("dark", t.dark) }(t["data-color-scheme"]);
            a.styleSheet ? a.styleSheet.cssText = n : a.appendChild(e.ownerDocument.createTextNode(n));
            var l = "large" === m(t["data-size"]),
                c = r("a", { className: "btn", href: t.href, rel: "noopener", target: "_blank", title: t.title || void 0, "aria-label": t["aria-label"] || void 0, innerHTML: k(t["data-icon"], l ? 16 : 14) }, [" ", r("span", {}, [t["data-text"] || ""])]),
                s = e.appendChild(r("div", { className: "widget" + (l ? " widget-lg" : "") }, [c])),
                h = c.hostname.replace(/\.$/, "");
            if (h.length < i.length || ("." + h).substring(h.length - i.length) !== "." + i) return c.removeAttribute("href"), void o(s);
            var f = (" /" + c.pathname).split(/\/+/);
            if (((h === i || h === "gist." + i) && "archive" === f[3] || h === i && "releases" === f[3] && ("download" === f[4] || "latest" === f[4] && "download" === f[5]) || h === "codeload." + i) && (c.target = "_top"), "true" === m(t["data-show-count"]) && h === i) {
                var u, p;
                if (!f[2] && f[1]) p = "followers", u = "?tab=followers";
                else if (!f[3] && f[2]) p = "stargazers_count", u = "/stargazers";
                else if (f[4] || "subscription" !== f[3])
                    if (f[4] || "fork" !== f[3]) {
                        if ("issues" !== f[3]) return void o(s);
                        p = "open_issues_count", u = "/issues"
                    } else p = "forks_count", u = "/network/members";
                else p = "subscribers_count", u = "/watchers";
                var b = f[2] ? "/repos/" + f[1] + "/" + f[2] : "/users/" + f[1];
                C.call(this, "https://api.github.com" + b, (function(e, t) {
                    if (!e) {
                        var a = t[p];
                        s.appendChild(r("a", { className: "social-count", href: t.html_url + u, rel: "noopener", target: "_blank", "aria-label": a + " " + p.replace(/_count$/, "").replace("_", " ").slice(0, a < 2 ? -1 : void 0) + " on GitHub" }, [("" + a).replace(/\B(?=(\d{3})+(?!\d))/g, ",")]))
                    }
                    o(s)
                }))
            } else o(s)
        },
        A = window.devicePixelRatio || 1,
        M = function(e) { return (A > 1 ? o.ceil(o.round(e * A) / A * 2) / 2 : o.ceil(e)) || 0 },
        L = function(e, t) { e.style.width = t[0] + "px", e.style.height = t[1] + "px" },
        E = function(t, r) {
            if (null != t && null != r)
                if (t.getAttribute && (t = function(e) {
                        for (var t = { href: e.href, title: e.title, "aria-label": e.getAttribute("aria-label") }, o = ["icon", "color-scheme", "text", "size", "show-count"], r = 0, a = o.length; r < a; r++) {
                            var n = "data-" + o[r];
                            t[n] = e.getAttribute(n)
                        }
                        return null == t["data-text"] && (t["data-text"] = e.textContent || e.innerText), t
                    }(t)), c) {
                    var a = p("span");
                    F(a.attachShadow({ mode: "closed" }), t, (function() { r(a) }))
                } else {
                    var i = p("iframe", { src: "javascript:0", title: t.title || void 0, allowtransparency: !0, scrolling: "no", frameBorder: 0 });
                    L(i, [0, 0]), i.style.border = "none";
                    var l = function() {
                        var a, c = i.contentWindow;
                        try { a = c.document.body } catch (t) { return void e.body.appendChild(i.parentNode.removeChild(i)) }
                        h(i, "load", l), F.call(c, a, t, (function(e) {
                            var a = function(e) {
                                var t = e.offsetWidth,
                                    r = e.offsetHeight;
                                if (e.getBoundingClientRect) {
                                    var a = e.getBoundingClientRect();
                                    t = o.max(t, M(a.width)), r = o.max(r, M(a.height))
                                }
                                return [t, r]
                            }(e);
                            i.parentNode.removeChild(i), f(i, "load", (function() { L(i, a) })), i.src = n + "#" + (i.name = function(e, t, o, r) {
                                null == t && (t = "&"), null == o && (o = "="), null == r && (r = window.encodeURIComponent);
                                var a = [];
                                for (var n in e) {
                                    var i = e[n];
                                    null != i && a.push(r(n) + o + r(i))
                                }
                                return a.join(t)
                            }(t)), r(i)
                        }))
                    };
                    s(i, "load", l), e.body.appendChild(i)
                }
        };
    t.protocol + "//" + t.host + t.pathname === n ? F(e.body, d(window.name || t.hash.replace(/^#/, "")), (function() {})) : function(t) {
        if ("complete" === e.readyState || "loading" !== e.readyState && !e.documentElement.doScroll) setTimeout(t);
        else if (e.addEventListener) {
            var o = b(t);
            f(e, "DOMContentLoaded", o), f(window, "load", o)
        } else u(e, /m/, t)
    }((function() { for (var t = e.querySelectorAll ? e.querySelectorAll("a.github-button") : function() { for (var t = [], o = e.getElementsByTagName("a"), r = 0, a = o.length; r < a; r++) - 1 !== (" " + o[r].className + " ").replace(/[ \t\n\f\r]+/g, " ").indexOf(" github-button ") && t.push(o[r]); return t }(), o = 0, r = t.length; o < r; o++) ! function(e) { E(e, (function(t) { e.parentNode.replaceChild(t, e) })) }(t[o]) }))
}();