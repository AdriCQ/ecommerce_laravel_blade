"use strict";(self["webpackChunkecommerce_admin"]=self["webpackChunkecommerce_admin"]||[]).push([[452],{3452:(e,d,a)=>{a.r(d),a.d(d,{default:()=>k});var r=a(3673),t=a(2323);const u={class:"text-h6 text-grey-9"};function o(e,d,a,o,c,n){const p=(0,r.up)("q-card-section"),l=(0,r.up)("product-form"),i=(0,r.up)("q-expansion-item"),s=(0,r.up)("image-uploader"),m=(0,r.up)("q-list"),f=(0,r.up)("q-card"),g=(0,r.up)("q-page");return(0,r.wg)(),(0,r.j4)(g,{padding:""},{default:(0,r.w5)((()=>[(0,r.Wm)(f,null,{default:(0,r.w5)((()=>[(0,r.Wm)(p,null,{default:(0,r.w5)((()=>[(0,r._)("div",u,(0,t.zw)(0===e.productId?"Crear":"Modificar")+" Producto",1)])),_:1}),e.product.id?((0,r.wg)(),(0,r.j4)(m,{key:1,bordered:"",class:"rounded-borders"},{default:(0,r.w5)((()=>[(0,r.Wm)(i,{"expand-separator":"",label:"Datos del Producto"},{default:(0,r.w5)((()=>[(0,r.Wm)(l,{product:e.product},null,8,["product"])])),_:1}),(0,r.Wm)(i,{"expand-separator":"",label:"Imágenes"},{default:(0,r.w5)((()=>[(0,r.Wm)(s,{product:e.product,onUpdateProduct:e.onImageUpdateProduct},null,8,["product","onUpdateProduct"])])),_:1})])),_:1})):((0,r.wg)(),(0,r.j4)(p,{key:0},{default:(0,r.w5)((()=>[(0,r.Wm)(l,{product:e.product},null,8,["product"])])),_:1}))])),_:1})])),_:1})}var c=a(1959),n=a(9582),p=a(8872),l=a(1239),i=a(8825);const s=(0,r.aZ)({name:"ProductEditPage",components:{"image-uploader":(0,r.RC)((()=>Promise.all([a.e(736),a.e(811)]).then(a.bind(a,7811)))),"product-form":(0,r.RC)((()=>Promise.all([a.e(736),a.e(146)]).then(a.bind(a,2146))))},setup(){const e=(0,i.Z)(),d=(0,n.yj)(),a=(0,n.tv)(),t=(0,p.Ey)(p.xj),{}=(0,l.y)(e,a);(0,r.wF)((()=>{u.value=d.params&&d.params.id&&!isNaN(Number(d.params.id))?Number(d.params.id):0,0===u.value?o.value={id:0,description:"",image:"",name:"",price:0,stock:0,gallery:[]}:t.findProductById(u.value)&&(o.value=t.findProductById(u.value))}));const u=(0,c.iH)(0),o=(0,c.iH)({id:0,description:"",image:"",name:"",price:0,stock:0,gallery:[]});function s(e){t.updateProduct(Number(e.id),e)}return{product:o,productId:u,onImageUpdateProduct:s}}});var m=a(4260),f=a(4379),g=a(151),w=a(5589),P=a(7011),b=a(4615),v=a(7518),y=a.n(v);const _=(0,m.Z)(s,[["render",o]]),k=_;y()(s,"components",{QPage:f.Z,QCard:g.Z,QCardSection:w.Z,QList:P.Z,QExpansionItem:b.Z})}}]);