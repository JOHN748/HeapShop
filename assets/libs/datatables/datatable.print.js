/*!
 Print button for Buttons and DataTables.
 2016 SpryMedia Ltd - datatables.net/license
*/
(function (b) {
    "function" === typeof define && define.amd
        ? define(["jquery", "datatables.net", "datatables.net-buttons"], function (c) {
              return b(c, window, document);
          })
        : "object" === typeof exports
        ? (module.exports = function (c, g) {
              c || (c = window);
              (g && g.fn.dataTable) || (g = require("datatables.net")(c, g).$);
              g.fn.dataTable.Buttons || require("datatables.net-buttons")(c, g);
              return b(g, c, c.document);
          })
        : b(jQuery, window, document);
})(function (b, c, g, y) {
    var u = b.fn.dataTable,
        n = g.createElement("a"),
        v = function (a) {
            n.href = a;
            a = n.host;
            -1 === a.indexOf("/") && 0 !== n.pathname.indexOf("/") && (a += "/");
            return n.protocol + "//" + a + n.pathname + n.search;
        };
    u.ext.buttons.print = {
        className: "buttons-print",
        text: function (a) {
            return a.i18n("buttons.print", "Print");
        },
        action: function (a, k, p, h) {
            a = k.buttons.exportData(b.extend({ decodeEntities: !1 }, h.exportOptions));
            p = k.buttons.exportInfo(h);
            var w = k
                    .columns(h.exportOptions.columns)
                    .flatten()
                    .map(function (d) {
                        return k.settings()[0].aoColumns[k.column(d).index()].sClass;
                    })
                    .toArray(),
                r = function (d, e) {
                    for (var x = "<tr>", l = 0, z = d.length; l < z; l++) x += "<" + e + " " + (w[l] ? 'class="' + w[l] + '"' : "") + ">" + (null === d[l] || d[l] === y ? "" : d[l]) + "</" + e + ">";
                    return x + "</tr>";
                },
                m = '<table class="' + k.table().node().className + '">';
            h.header && (m += "<thead>" + r(a.header, "th") + "</thead>");
            m += "<tbody>";
            for (var t = 0, A = a.body.length; t < A; t++) m += r(a.body[t], "td");
            m += "</tbody>";
            h.footer && a.footer && (m += "<tfoot>" + r(a.footer, "th") + "</tfoot>");
            m += "</table>";
            var f = c.open("", "");
            f.document.close();
            var q = "<title>" + p.title + "</title>";
            b("style, link").each(function () {
                var d = q,
                    e = b(this).clone()[0];
                "link" === e.nodeName.toLowerCase() && (e.href = v(e.href));
                q = d + e.outerHTML;
            });
            try {
                f.document.head.innerHTML = q;
            } catch (d) {
                b(f.document.head).html(q);
            }
            f.document.body.innerHTML = "<h1>" + p.title + "</h1><div>" + (p.messageTop || "") + "</div>" + m + "<div>" + (p.messageBottom || "") + "</div>";
            b(f.document.body).addClass("dt-print-view");
            b("img", f.document.body).each(function (d, e) {
                e.setAttribute("src", v(e.getAttribute("src")));
            });
            h.customize && h.customize(f, h, k);
            a = function () {
                h.autoPrint && (f.print(), f.close());
            };
            navigator.userAgent.match(/Trident\/\d.\d/) ? a() : f.setTimeout(a, 1e3);
        },
        title: "*",
        messageTop: "*",
        messageBottom: "*",
        exportOptions: {},
        header: !0,
        footer: !1,
        autoPrint: !0,
        customize: null,
    };
    return u.Buttons;
});
