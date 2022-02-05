"use strict";(self["webpackChunkecommerce_admin"]=self["webpackChunkecommerce_admin"]||[]).push([[154],{5154:(e,t,i)=>{i.r(t),i.d(t,{default:()=>Z});var o=i(3673),r=i(2323);const a={class:"absolute-bottom-right",style:{padding:"0px","background-color":"transparent"}},l={key:0,class:"absolute-top-left",style:{padding:"0px","background-color":"transparent"}},n={key:1,class:"absolute-top-right",style:{padding:"0px","background-color":"transparent"}},c={class:"text-caption text-bold"};function s(e,t,i,s,d,u){const p=(0,o.up)("q-chip"),m=(0,o.up)("q-img"),g=(0,o.up)("q-card-section"),b=(0,o.up)("q-carousel-slide"),k=(0,o.up)("q-carousel"),w=(0,o.up)("q-card");return(0,o.wg)(),(0,o.j4)(w,{class:"text-grey-9",style:{"max-width":"25rem"}},{default:(0,o.w5)((()=>[(0,o.Wm)(m,{src:`${e.baseURL}${e.product.image}`,ratio:4/3,"spinner-color":"primary","spinner-size":"50px"},{default:(0,o.w5)((()=>[(0,o._)("div",a,[(0,o.Wm)(p,{"text-color":"grey-9",icon:"mdi-package-variant",label:e.product.stock},null,8,["label"])]),e.withDetails?(0,o.kq)("",!0):((0,o.wg)(),(0,o.iD)("div",l,[(0,o.Wm)(p,{"text-color":"dark",clickable:"",onClick:e.edit,icon:"mdi-pencil-box-outline",label:"Editar"},null,8,["onClick"])])),e.withDetails?(0,o.kq)("",!0):((0,o.wg)(),(0,o.iD)("div",n,[(0,o.Wm)(p,{"text-color":"dark",clickable:"",onClick:e.remove,icon:"mdi-delete",label:"Eliminar"},null,8,["onClick"])]))])),_:1},8,["src"]),(0,o.Wm)(g,null,{default:(0,o.w5)((()=>[(0,o._)("div",{class:"text-body2",onClick:t[0]||(t[0]=(...t)=>e.edit&&e.edit(...t))},(0,r.zw)(e.product.name),1),(0,o._)("div",c,"$"+(0,r.zw)(Number(e.product.price).toFixed(2)),1)])),_:1}),e.withDetails?((0,o.wg)(),(0,o.iD)(o.HY,{key:0},[(0,o.Wm)(g,{class:"text-caption",innerHTML:e.product.description},null,8,["innerHTML"]),e.product.gallery.length?((0,o.wg)(),(0,o.j4)(k,{key:0,modelValue:e.slider,"onUpdate:modelValue":t[1]||(t[1]=t=>e.slider=t),swipeable:"",animated:"",navigation:"",arrows:"",infinite:"",autoplay:"","control-color":"primary","prev-icon":"mdi-arrow-left-bold","next-icon":"mdi-arrow-right-bold","transition-prev":"jump-right","transition-next":"jump-left"},{default:(0,o.w5)((()=>[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(e.product.gallery,((t,i)=>((0,o.wg)(),(0,o.j4)(b,{name:i,class:"column no-wrap flex-center",key:`p-gallery-item-${i}`},{default:(0,o.w5)((()=>[(0,o.Wm)(m,{src:`${e.baseURL}${t}`,ratio:4/3,"spinner-color":"primary","spinner-size":"50px"},null,8,["src"])])),_:2},1032,["name"])))),128))])),_:1},8,["modelValue"])):(0,o.kq)("",!0)],64)):(0,o.kq)("",!0)])),_:1})}var d=i(8872),u=i(269),p=i(1959),m=i(9582),g=i(1768),b=i(8825),k=i(1239);const w=(0,o.aZ)({name:"ProductWidget",props:{product:{type:Object,required:!0},withDetails:{type:Boolean,default:!1}},setup(e){const t=(0,d.Ey)(d.xj),i=(0,m.tv)(),o=(0,b.Z)(),{errorHandler:r,deleteDialog:a}=(0,k.y)(o,i),{product:l}=(0,p.BK)(e),n=(0,p.iH)(0);function c(){l.value.id&&i.push({name:u.I.PRODUCT_EDIT,params:{id:l.value.id}})}function s(){a({title:"Eliminar Producto",message:"¿Está seguro que desea eliminar el producto?",onOk:()=>{t.deleteProductAction(Number(l.value.id)).then((()=>{o.notify({message:"Producto eliminado",type:"positive",position:"center",actions:[{icon:"mdi-close",color:"white",handler:()=>{}}]})})).catch((e=>{r(e,"Error eliminando producto")}))}})}return Object.assign(Object.assign({},e),{slider:n,edit:c,baseURL:g.baseURL,remove:s})}});var y=i(4260),h=i(151),x=i(4027),v=i(7030),f=i(5589),C=i(1277),q=i(4593),D=i(7518),_=i.n(D);const j=(0,y.Z)(w,[["render",s]]),Z=j;_()(w,"components",{QCard:h.Z,QImg:x.Z,QChip:v.Z,QCardSection:f.Z,QCarousel:C.Z,QCarouselSlide:q.Z})}}]);