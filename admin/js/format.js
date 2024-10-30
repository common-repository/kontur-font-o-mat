! function (e) {
    var t = {};

    function r(n) {
        if (t[n]) return t[n].exports;
        var o = t[n] = {
            i: n,
            l: !1,
            exports: {}
        };
        return e[n].call(o.exports, o, o.exports, r), o.l = !0, o.exports
    }
    r.m = e, r.c = t, r.d = function (e, t, n) {
        r.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: n
        })
    }, r.r = function (e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, r.t = function (e, t) {
        if (1 & t && (e = r(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var n = Object.create(null);
        if (r.r(n), Object.defineProperty(n, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var o in e) r.d(n, o, function (t) {
                return e[t]
            }.bind(null, o));
        return n
    }, r.n = function (e) {
        var t = e && e.__esModule ? function () {
            return e.default
        } : function () {
            return e
        };
        return r.d(t, "a", t), t
    }, r.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, r.p = "", r(r.s = 20)
}([function (e, t) {
    e.exports = window.wp.element
}, function (e, t) {
    e.exports = window.wp.components
}, function (e, t) {
    e.exports = window.wp.richText
}, function (e, t) {
    e.exports = window.wp.i18n
}, function (e, t) {
    e.exports = window.wp.blockEditor
}, function (e, t) {
    e.exports = window.wp.primitives
}, function (e, t, r) {
    var n = r(14),
        o = r(15),
        l = r(10),
        c = r(16);
    e.exports = function (e) {
        return n(e) || o(e) || l(e) || c()
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, function (e, t, r) {
    var n = r(17),
        o = r(18),
        l = r(10),
        c = r(19);
    e.exports = function (e, t) {
        return n(e) || o(e, t) || l(e, t) || c()
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, , function (e, t) {
    e.exports = function (e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var r = 0, n = new Array(t); r < t; r++) n[r] = e[r];
        return n
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, function (e, t, r) {
    var n = r(9);
    e.exports = function (e, t) {
        if (e) {
            if ("string" == typeof e) return n(e, t);
            var r = Object.prototype.toString.call(e).slice(8, -1);
            return "Object" === r && e.constructor && (r = e.constructor.name), "Map" === r || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? n(e, t) : void 0
        }
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, 
    function (e, t) {
    e.exports = function (e, t, r) {
        return t in e ? Object.defineProperty(e, t, {
            value: r,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = r, e
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, function (e, t) {
    e.exports = window.lodash
}, function (e, t) {
    e.exports = window.wp.data
}, function (e, t, r) {
    var n = r(9);
    e.exports = function (e) {
        if (Array.isArray(e)) return n(e)
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, function (e, t) {
    e.exports = function (e) {
        if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"]) return Array.from(e)
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, function (e, t) {
    e.exports = function () {
        throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, function (e, t) {
    e.exports = function (e) {
        if (Array.isArray(e)) return e
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, function (e, t) {
    e.exports = function (e, t) {
        var r = e && ("undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"]);
        if (null != r) {
            var n, o, l = [],
                _n = !0,
                c = !1;
            try {
                for (r = r.call(e); !(_n = (n = r.next()).done) && (l.push(n.value), !t || l.length !== t); _n = !0);
            } catch (e) {
                c = !0, o = e
            } finally {
                try {
                    _n || null == r.return || r.return()
                } finally {
                    if (c) throw o
                }
            }
            return l
        }
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, function (e, t) {
    e.exports = function () {
        throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
    }, e.exports.default = e.exports, e.exports.__esModule = !0
}, 

// kontur Modules
    
    function (e, t, r) {
    "use strict";
    r.r(t);
    var n = r(11),
        o = r.n(n),
        l = r(0),
        c = r(12),
        i = r(13),
        a = r(4),
        u = r(2),
        s = r(3),
        p = r(1),
//Font Icon
        f = Object(l.createElement)(p.SVG, {
            xmlns: "http://www.w3.org/2000/svg",
            viewBox: "0 0 18 18"
        }, Object(l.createElement)(p.Path, {
            d: "M4.87,20.56H1.11a1.13,1.13,0,0,1-.84-.27A1.16,1.16,0,0,1,0,19.44V3.75a1.64,1.64,0,0,1,.08-.53.88.88,0,0,1,.26-.36L3.46.22A.85.85,0,0,1,3.79.06,1.63,1.63,0,0,1,4.24,0H15a1.13,1.13,0,0,1,.84.27,1.13,1.13,0,0,1,.27.84V4a1.45,1.45,0,0,1-.09.54.9.9,0,0,1-.25.36L13.1,7.14a1.11,1.11,0,0,1,.82.27,1.16,1.16,0,0,1,.27.85v2.9a1.36,1.36,0,0,1-.09.53.87.87,0,0,1-.25.37L10.7,14.67a.7.7,0,0,1-.3.17,1.33,1.33,0,0,1-.45.07H9.1V16.8a1.46,1.46,0,0,1-.08.54.93.93,0,0,1-.26.36L5.62,20.31a.81.81,0,0,1-.31.17A1.23,1.23,0,0,1,4.87,20.56ZM8,17.67a.91.91,0,0,0,.67-.2,1,1,0,0,0,.2-.67V12h4.21a1,1,0,0,0,.67-.2.91.91,0,0,0,.21-.67V8.26a.91.91,0,0,0-.21-.67.91.91,0,0,0-.67-.21H8.86V4.87H15a.9.9,0,0,0,.66-.21A.91.91,0,0,0,15.91,4V1.11A.89.89,0,0,0,15.7.45.9.9,0,0,0,15,.24H4.24a.91.91,0,0,0-.67.21.89.89,0,0,0-.2.66V16.8a.91.91,0,0,0,.2.67.91.91,0,0,0,.67.2ZM6,15.5V2.42h7.73v.24H6.25V9.59h5.52v.24H6.25V15.5Z "
        })),
        
// clear format icon
        m = Object(l.createElement)(p.SVG, {
            xmlns: "http://www.w3.org/2000/svg",
            viewBox: "0 0 24 24"
        }, Object(l.createElement)(p.Path, {
            d: "M 17.148438 5.507812 L 18.46875 6.839844 C 18.960938 7.320312 19.199219 7.96875 19.199219 8.605469 L 19.199219 11.148438 C 19.199219 11.785156 18.960938 12.433594 18.46875 12.910156 L 10.511719 20.867188 C 10.03125 21.359375 9.382812 21.601562 8.746094 21.601562 C 8.113281 21.601562 7.464844 21.359375 6.984375 20.867188 L 5.652344 19.546875 L 4.332031 18.214844 C 3.839844 17.734375 3.601562 17.089844 3.601562 16.453125 L 3.601562 13.90625 C 3.601562 13.261719 3.839844 12.625 4.332031 12.132812 L 12.289062 4.1875 C 12.769531 3.695312 13.414062 3.457031 14.050781 3.457031 C 14.6875 3.457031 15.324219 3.695312 15.816406 4.1875 Z M 9.695312 17.148438 L 17.398438 9.445312 C 17.867188 8.976562 17.867188 8.207031 17.398438 7.726562 L 14.832031 5.160156 C 14.605469 4.933594 14.292969 4.8125 13.96875 4.8125 C 13.644531 4.8125 13.34375 4.933594 13.117188 5.160156 L 5.410156 12.863281 C 4.945312 13.34375 4.945312 14.113281 5.410156 14.578125 L 7.980469 17.148438 C 8.4375 17.605469 9.226562 17.605469 9.695312 17.148438 Z M 9.695312 17.148438 "
        }));

    function b(e, t) {
        var r = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var n = Object.getOwnPropertySymbols(e);
            t && (n = n.filter((function (t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            }))), r.push.apply(r, n)
        }
        return r
    }
    var d = Object(s.__)("Clear font-o-mat", "kontur-font-o-mat");
    rtexConf.clearFormatActive && Object(u.registerFormatType)("rtex/rtex-clear-format", {
        title: d,
        tagName: "span",
        className: "rtex-clear-format",
        edit: function (e) {
            var t = e.isActive,
                r = e.value,
                n = e.onChange;
            return Object(l.createElement)(a.RichTextToolbarButton, {
                icon: m,
                title: d,
                onClick: function () {
                    var e = Object(i.select)("core/rich-text").getFormatTypes();
                    if (0 < e.length) {
                        var t = r;
                        Object(c.map)(e, (function (e) {
                            t = Object(u.removeFormat)(t, e.name)
                        })), n(function (e) {
                            for (var t = 1; t < arguments.length; t++) {
                                var r = null != arguments[t] ? arguments[t] : {};
                                t % 2 ? b(Object(r), !0).forEach((function (t) {
                                    o()(e, t, r[t])
                                })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(r)) : b(Object(r)).forEach((function (t) {
                                    Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(r, t))
                                }))
                            }
                            return e
                        }({}, t))
                    }
                },
                isActive: t
            })
        }
    });
    var x = r(5),
        
// underline icon
        v = Object(l.createElement)(x.SVG, {
            xmlns: "http://www.w3.org/2000/svg",
            viewBox: "0 0 24 24"
        }, Object(l.createElement)(x.Path, {
            d: "M7 18v1h10v-1H7zm5-2c1.5 0 2.6-.4 3.4-1.2.8-.8 1.1-2 1.1-3.5V5H15v5.8c0 1.2-.2 2.1-.6 2.8-.4.7-1.2 1-2.4 1s-2-.3-2.4-1c-.4-.7-.6-1.6-.6-2.8V5H7.5v6.2c0 1.5.4 2.7 1.1 3.5.8.9 1.9 1.3 3.4 1.3z"
        })),
        O = Object(s.__)("kontur Underline", "kontur-font-o-mat");
    rtexConf.underlineActive && Object(u.registerFormatType)("rtex/rtex-underline", {
        title: O,
        tagName: "u",
        className: null,
        edit: function (e) {
            var t = e.isActive,
                r = e.value,
                n = e.onChange;
            return Object(l.createElement)(a.RichTextToolbarButton, {
                icon: v,
                title: O,
                onClick: function () {
                    return n(Object(u.toggleFormat)(r, {
                        type: "rtex/rtex-underline"
                    }))
                },
                isActive: t
            })
        }
    });
    var j = r(6),
        g = r.n(j),
        w = r(7),
        y = r.n(w),
        h = Object(p.createSlotFill)("konturFontoMatDropdownControls"),
        C = h.Fill,
        E = h.Slot,
        _ = C;
    _.Slot = E;
    var S = function () {
        return Object(l.createElement)(a.BlockFormatControls, null, Object(l.createElement)(p.ToolbarGroup, null, Object(l.createElement)(_.Slot, null, (function (e) {
            return Object(l.createElement)(p.ToolbarItem, null, (function (t) {
                return Object(l.createElement)(p.DropdownMenu, {
                    toggleProps: t,
                    icon: f,
                    label: Object(s.__)("kontur Font-O-Mat", "kontur-font-o-mat"),
                    controls: e.map((function (e) {
                        return y()(e, 1)[0].props
                    }))
                })
            }))
        }))))
    };
    rtexConf.kntrfntmt.forEach((function (e, t) {
        var r = e.title,
            n = e.formatName,
            o = e.className,
            c = e.setting,
            i = void 0 === c ? {} : c;
        return u.registerFormatType.apply(void 0, g()(function (e, t) {
            var r = e.title,
                n = e.className,
                o = e.setting,
                c = void 0 === o ? {} : o,
                i = "rtex/" + n,
                a = function (e) {
                    return Object(l.createElement)(_, null, Object(l.createElement)(p.ToolbarButton, {
                        icon: f,
                        title: Object(l.createElement)("div", {
                            className: n
                        }, r),
                        onClick: function () {
                            e.onChange(Object(u.toggleFormat)(e.value, {
                                type: i
                            }))
                        },
                        isActive: e.isActive
                    }))
                };
            return c.title = r, c.tagName = "span", c.className = n, c.edit = function (e) {
                return t ? a(e) : Object(l.createElement)(l.Fragment, null, a(e), Object(l.createElement)(S, null))
            }, [i, c]
        }({
            title: r,
            formatName: n,
            className: o,
            setting: i
        }, t)))
    }));

// FONT SIZE
// kontur Font Size Icon
    var M = Object(l.createElement)(x.SVG, {
            xmlns: "http://www.w3.org/2000/svg",
            viewBox: "0 0 18 14"
        }, Object(l.createElement)(x.Path, {
            d: "M5.07,13.6,5,12.48h0a3.19,3.19,0,0,1-2.62,1.3,2.07,2.07,0,0,1-2.3-2c0-1.64,1.52-2.71,4.89-2.66V9a1.93,1.93,0,0,0-2-2.15,3.63,3.63,0,0,0-2.07.6L.53,6.89a4.31,4.31,0,0,1,2.37-.7c2.46,0,2.73,1.9,2.73,3v2.62a11.44,11.44,0,0,0,.12,1.75ZM4.89,9.75C3,9.68.78,10,.78,11.66a1.46,1.46,0,0,0,1.58,1.52A2.56,2.56,0,0,0,4.8,11.7a1.18,1.18,0,0,0,.09-.42Z M16.74,14.26l-.23-2.14h-.06a6.15,6.15,0,0,1-5,2.49C8.25,14.61,7,12.47,7,10.79,7,7.62,9.9,5.57,16.4,5.65V5.33c0-1-.24-4.17-3.95-4.14a7,7,0,0,0-4,1.16L8,1.33A8.4,8.4,0,0,1,12.57,0c4.72,0,5.25,3.65,5.25,5.86v5a21.09,21.09,0,0,0,.23,3.36ZM16.4,6.84c-3.69-.11-7.92.47-7.92,3.68a2.81,2.81,0,0,0,3,2.93,4.91,4.91,0,0,0,4.7-2.84,2.21,2.21,0,0,0,.18-.81Z"
        })),
        F = Object(p.createSlotFill)("FontSizeDropdownControls"),
        N = F.Fill,
        P = F.Slot,
        T = N;
    T.Slot = P;

        
        
        
    rtexConf.fontSize.forEach((function (e, t) {
        var r = e.title,
            n = e.formatName,
            o = e.className,
            c = e.setting,
            i = void 0 === c ? {} : c;
        return u.registerFormatType.apply(void 0, g()(function (e, t) {
            var r = e.title,
                n = e.className,
                o = e.setting,
                c = void 0 === o ? {} : o,
                i = "rtex/" + n,
                a = function (e) {
                    return Object(l.createElement)(T, null, Object(l.createElement)(p.ToolbarButton, {
                        icon: M,
                        title: Object(l.createElement)("div", {
                            className: n
                        }, r),
                        onClick: function () {
                            e.onChange(Object(u.toggleFormat)(e.value, {
                                type: i
                            }))
                        },
                        isActive: e.isActive
                    }))
                };
            return c.title = r, c.tagName = "span", c.className = n, c.edit = function (e) {
                return t ? a(e) : Object(l.createElement)(l.Fragment, null, a(e), Object(l.createElement)(A, null))
            }, [i, c]
        }({
            title: r,
            formatName: n,
            className: o,
            setting: i
        }, t)))
    }))
        
        
//FONT WEIGHT   
        
        
    var 
        F = Object(p.createSlotFill)("FontWeightDropdownControls"),
        N = F.Fill,
        P = F.Slot,
        T = N;
    T.Slot = P;
    var A = function () {
        return Object(l.createElement)(a.BlockFormatControls, null, Object(l.createElement)(p.ToolbarGroup, null, Object(l.createElement)(T.Slot, null, (function (e) {
            return Object(l.createElement)(p.ToolbarItem, null, (function (t) {
                return Object(l.createElement)(p.DropdownMenu, {
                    toggleProps: t,
                    icon: M,
                    label: Object(s.__)("kontur Size and Weight", "kontur-font-o-mat"),
                    controls: e.map((function (e) {
                        return y()(e, 1)[0].props
                    }))
                })
            }))
        }))))
    };
        
        
      rtexConf.fontWeight.forEach((function (e, t) {
        var r = e.title,
            n = e.formatName,
            o = e.className,
            c = e.setting,
            i = void 0 === c ? {} : c;
        return u.registerFormatType.apply(void 0, g()(function (e, t) {
            var r = e.title,
                n = e.className,
                o = e.setting,
                c = void 0 === o ? {} : o,
                i = "rtex/" + n,
                a = function (e) {
                    return Object(l.createElement)(T, null, Object(l.createElement)(p.ToolbarButton, {
                        icon: M,
                        title: Object(l.createElement)("div", {
                            className: n
                        }, r),
                        onClick: function () {
                            e.onChange(Object(u.toggleFormat)(e.value, {
                                type: i
                            }))
                        },
                        isActive: e.isActive
                    }))
                };
            return c.title = r, c.tagName = "span", c.className = n, c.edit = function (e) {
                return t ? a(e) : Object(l.createElement)(l.Fragment, null, a(e), Object(l.createElement)(A, null))
            }, [i, c]
        }({
            title: r,
            formatName: n,
            className: o,
            setting: i
        }, t)))
    }))
              

        
//END
}]
);