"use strict";(self["webpackChunkecommerce_admin"]=self["webpackChunkecommerce_admin"]||[]).push([[916],{4916:(e,a,o)=>{o.r(a),o.d(a,{default:()=>h});var n=o(3673);function r(e,a,o,r,t,l){const i=(0,n.up)("q-uploader"),c=(0,n.up)("q-card-section"),d=(0,n.up)("q-card");return(0,n.wg)(),(0,n.j4)(d,null,{default:(0,n.w5)((()=>[(0,n.Wm)(c,null,{default:(0,n.w5)((()=>[(0,n.Wm)(i,{factory:e.factoryFn,label:"Cambiar Imagen Principal",accept:"image/*",onFactoryFailed:e.factoryFail,onFailed:e.factoryFail,onUploaded:e.onUploaded},null,8,["factory","onFactoryFailed","onFailed","onUploaded"])])),_:1}),(0,n.Wm)(c,null,{default:(0,n.w5)((()=>[(0,n.Wm)(i,{factory:e.galleryFactoryFn,label:"Subir Galería",accept:"image/*",multiple:"","max-files":"4",onFactoryFailed:e.factoryFail,onFailed:e.factoryFail,onUploaded:e.onUploaded},null,8,["factory","onFactoryFailed","onFailed","onUploaded"])])),_:1})])),_:1})}var t=o(1959),l=o(1768),i=o(8872),c=o(8825),d=o(9582),u=o(754);const s=(0,n.aZ)({name:"Imagesproduct",emits:["update-product"],props:{product:{type:Object,required:!0}},setup(e,a){const{product:o}=(0,t.BK)(e),n=(0,i.Ey)(i.Qw),r=(0,c.Z)(),s=(0,d.tv)();function p(){return new Promise((e=>{setTimeout((()=>{e({url:`${l.baseURL}/api/products/${o.value.id}/image`,method:"POST",headers:[{name:"Authorization",value:`Bearer ${n.apiToken}`}],fieldName:"image"})}),200)}))}function m(){return new Promise((e=>{setTimeout((()=>{e({url:`${l.baseURL}/api/products/${o.value.id}/gallery`,method:"POST",headers:[{name:"Authorization",value:`Bearer ${n.apiToken}`}],fieldName:"image"})}),200)}))}function f(e){const o=e.xhr;o.response&&o.response.id&&a.emit("update-product",o.response),r.notify({message:"Imagen Guardada",type:"positive",position:"center",actions:[{icon:"mdi-close",color:"white",handler:()=>{}}]}),s.push({name:u.I.PRODUCTS})}function y(e){console.log(e)}return Object.assign(Object.assign({},e),{baseURL:l.baseURL,factoryFn:p,factoryFail:y,onUploaded:f,galleryFactoryFn:m})}});var p=o(4260),m=o(151),f=o(5589),y=o(1745),F=o(7518),g=o.n(F);const b=(0,p.Z)(s,[["render",r]]),h=b;g()(s,"components",{QCard:m.Z,QCardSection:f.Z,QUploader:y.Z})}}]);