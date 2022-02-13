"use strict"; (self["webpackChunkecommerce_admin"] = self["webpackChunkecommerce_admin"] || []).push([[240], { 4240: (e, r, d) => { d.r(r), d.d(r, { default: () => z }); var t = d(3673), a = d(2323); const o = { class: "text-body2" }, n = { class: "text-body2" }, s = { class: "text-body2" }, c = { class: "text-body2" }, i = { class: "text-body2" }, l = { class: "text-body2" }, m = { class: "text-body2 text-bold" }, u = { class: "text-body2" }; function p(e, r, d, p, v, w) { const _ = (0, t.up)("q-icon"), b = (0, t.up)("q-card-section"), k = (0, t.up)("q-chip"), y = (0, t.up)("q-card"); return (0, t.wg)(), (0, t.j4)(y, { class: "text-grey-9" }, { default: (0, t.w5)((() => [(0, t.Wm)(b, null, { default: (0, t.w5)((() => [(0, t._)("div", { class: "float-right cursor-pointer text-negative", onClick: r[0] || (r[0] = (...r) => e.remove && e.remove(...r)) }, [(0, t.Wm)(_, { name: "mdi-delete" })]), (0, t._)("div", o, [(0, t.Wm)(_, { name: "mdi-unity" }), (0, t.Uk)(" ID: " + (0, a.zw)(e.order.id), 1)]), (0, t._)("div", n, [(0, t.Wm)(_, { name: "mdi-account" }), (0, t.Uk)(" " + (0, a.zw)(e.order.name), 1)]), (0, t._)("div", s, [(0, t.Wm)(_, { name: "mdi-email-outline" }), (0, t.Uk)(" " + (0, a.zw)(e.order.email), 1)]), (0, t._)("div", c, [(0, t.Wm)(_, { name: "mdi-phone" }), (0, t.Uk)(" " + (0, a.zw)(e.order.phone), 1)]), (0, t._)("div", i, [(0, t.Wm)(_, { name: "mdi-map-marker" }), (0, t.Uk)(" " + (0, a.zw)(e.order.address), 1)]), (0, t._)("div", l, [(0, t.Wm)(_, { name: "mdi-calendar-clock" }), (0, t.Uk)(" " + (0, a.zw)(new Date(e.order.created_at).toLocaleString()), 1)]), (0, t._)("div", m, [(0, t.Wm)(_, { name: "mdi-cash-usd" }), (0, t.Uk)(" $" + (0, a.zw)(Number(e.order.total_price).toFixed(2)), 1)])])), _: 1 }), (0, t.Wm)(b, null, { default: (0, t.w5)((() => [((0, t.wg)(!0), (0, t.iD)(t.HY, null, (0, t.Ko)(e.order.order_products, ((e, r) => ((0, t.wg)(), (0, t.j4)(y, { bordered: "", key: `order-product-${r}` }, { default: (0, t.w5)((() => [(0, t.Wm)(b, { class: "q-py-xs" }, { default: (0, t.w5)((() => [(0, t._)("div", u, [(0, t.Wm)(k, { class: "glossy", label: `x${e.qty}` }, null, 8, ["label"]), (0, t.Uk)(" " + (0, a.zw)(e.product.name), 1)])])), _: 2 }, 1024)])), _: 2 }, 1024)))), 128))])), _: 1 })])), _: 1 }) } var v = d(8825), w = d(1239), _ = d(8872), b = d(1959); const k = (0, t.aZ)({ name: "OrderWidget", props: { order: { type: Object, required: !0 } }, setup(e) { const r = (0, _.Ey)(_.xj), { order: d } = (0, b.BK)(e), t = (0, v.Z)(), { errorHandler: a } = (0, w.y)(t); function o() { t.dialog({ title: "Eliminar Orden", message: "Está seguro que desea eliminar la orden?", ok: !0, cancel: !0 }).onOk((() => { d.value.id && r.removeOrder(d.value.id).catch((e => { a(e) })) })) } return Object.assign(Object.assign({}, e), { remove: o }) } }); var y = d(4260), x = d(151), g = d(5589), W = d(4554), f = d(7030), h = d(7518), U = d.n(h); const q = (0, y.Z)(k, [["render", p]]), z = q; U()(k, "components", { QCard: x.Z, QCardSection: g.Z, QIcon: W.Z, QChip: f.Z }) } }]);