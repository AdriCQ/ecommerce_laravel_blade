"use strict";(self["webpackChunkecommerce_admin"]=self["webpackChunkecommerce_admin"]||[]).push([[416],{5416:(e,a,r)=>{r.r(a),r.d(a,{default:()=>b});var t=r(3673);function o(e,a,r,o,n,c){const l=(0,t.up)("q-img"),s=(0,t.up)("q-uploader"),i=(0,t.up)("q-card-section"),u=(0,t.up)("q-card");return(0,t.wg)(),(0,t.j4)(u,null,{default:(0,t.w5)((()=>[(0,t.Wm)(i,{class:"row q-gutter-y-sm q-gutter-x-sm"},{default:(0,t.w5)((()=>[(0,t.Wm)(l,{src:`${e.baseURL}${e.product.image}`,"spinner-color":"primary","spinner-size":"50px",width:"8rem"},null,8,["src"]),(0,t.Wm)(s,{style:{"max-height":"8rem"},factory:e.factoryFn,label:"Cambiar Imagen Principal",accept:"image/*",onFactoryFailed:e.factoryFail,onFailed:e.factoryFail},null,8,["factory","onFactoryFailed","onFailed"])])),_:1}),(0,t.Wm)(i,{class:"row q-gutter-y-sm q-gutter-x-sm"},{default:(0,t.w5)((()=>[((0,t.wg)(!0),(0,t.iD)(t.HY,null,(0,t.Ko)(e.product.gallery,(a=>((0,t.wg)(),(0,t.j4)(l,{src:`${e.baseURL}/${a}`,"spinner-color":"primary","spinner-size":"50px",width:"8rem",key:`gallery-${a}`},null,8,["src"])))),128)),(0,t.Wm)(s,{style:{"max-height":"8rem"},url:"http://localhost:4444/upload",label:"Restricted to images",multiple:"",accept:"image/*"})])),_:1})])),_:1})}var n=r(1959),c=r(1768),l=r(8872);const s=(0,t.aZ)({name:"Imagesproduct",props:{product:{type:Object,required:!0}},setup(e){const{product:a}=(0,n.BK)(e),r=(0,l.Ey)(l.Qw);function t(){return new Promise((e=>{console.log({baseURL:c.baseURL,auth:`Bearer ${r.apiToken}`}),setTimeout((()=>{e({url:`${c.baseURL}/api/products/${a.value.id}/main-image`,method:"POST",headers:[{name:"Authorization",value:`Bearer ${r.apiToken}`}],fieldName:"image"})}),200)}))}function o(e){console.log(e)}return Object.assign(Object.assign({},e),{baseURL:c.baseURL,factoryFn:t,factoryFail:o})}});var i=r(4260),u=r(151),m=r(5589),p=r(4027),d=r(1745),g=r(7518),y=r.n(g);const f=(0,i.Z)(s,[["render",o]]),b=f;y()(s,"components",{QCard:u.Z,QCardSection:m.Z,QImg:p.Z,QUploader:d.Z})}}]);