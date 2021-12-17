"use strict";(self["webpackChunkecommerce_admin"]=self["webpackChunkecommerce_admin"]||[]).push([[310],{1310:(e,o,a)=>{a.r(o),a.d(o,{default:()=>A});var l=a(3673),t=a(8880),n=a(2323);const u=(0,l._)("div",{class:"text-h6 text-grey-9"},"Colaboradores",-1),r={class:"row q-col-gutter-sm"},i={class:"col-xs-12 col-sm-3"},d=(0,l._)("div",{class:"text-subtitle2"},"Nuevo Colaborador",-1),c={class:"text-body1 text-center text-grey-9"};function m(e,o,a,m,s,p){const f=(0,l.up)("q-card-section"),v=(0,l.up)("q-icon"),b=(0,l.up)("q-card"),g=(0,l.up)("user-widget"),w=(0,l.up)("q-input"),y=(0,l.up)("q-btn"),_=(0,l.up)("q-card-actions"),C=(0,l.up)("q-form"),h=(0,l.up)("q-dialog"),W=(0,l.up)("q-page");return(0,l.wg)(),(0,l.j4)(W,{padding:""},{default:(0,l.w5)((()=>[(0,l.Wm)(b,null,{default:(0,l.w5)((()=>[(0,l.Wm)(f,null,{default:(0,l.w5)((()=>[u])),_:1}),(0,l.Wm)(f,null,{default:(0,l.w5)((()=>[(0,l._)("div",r,[(0,l._)("div",i,[(0,l.Wm)(b,{class:"cursor-pointer text-grey-9 text-center",onClick:e.create},{default:(0,l.w5)((()=>[(0,l.Wm)(f,null,{default:(0,l.w5)((()=>[(0,l.Wm)(v,{size:"sm",name:"mdi-account-plus"}),d])),_:1})])),_:1},8,["onClick"])]),((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(e.users,((o,a)=>((0,l.wg)(),(0,l.iD)("div",{class:"col-xs-12 col-sm-3",key:`user-${a}`},[(0,l.Wm)(g,{class:"cursor-pointer",user:o,onClick:a=>e.update(Number(o.id),o)},null,8,["user","onClick"])])))),128))])])),_:1})])),_:1}),(0,l.Wm)(h,{modelValue:e.popup,"onUpdate:modelValue":o[4]||(o[4]=o=>e.popup=o)},{default:(0,l.w5)((()=>[(0,l.Wm)(b,{style:{"min-width":"20rem"}},{default:(0,l.w5)((()=>[(0,l.Wm)(C,{onSubmit:(0,t.iM)(e.onSubmit,["prevent"])},{default:(0,l.w5)((()=>[(0,l.Wm)(f,null,{default:(0,l.w5)((()=>[(0,l._)("div",c,(0,n.zw)("create"===e.mode?"Nuevo":"Modificar")+" Colaborador",1)])),_:1}),(0,l.Wm)(f,{class:"q-gutter-y-sm"},{default:(0,l.w5)((()=>[(0,l.Wm)(w,{modelValue:e.form.name,"onUpdate:modelValue":o[0]||(o[0]=o=>e.form.name=o),type:"text",label:"Nombre"},null,8,["modelValue"]),(0,l.Wm)(w,{modelValue:e.form.email,"onUpdate:modelValue":o[1]||(o[1]=o=>e.form.email=o),type:"email",label:"Email"},null,8,["modelValue"]),(0,l.Wm)(w,{modelValue:e.form.phone,"onUpdate:modelValue":o[2]||(o[2]=o=>e.form.phone=o),type:"tel",label:"Teléfono"},null,8,["modelValue"])])),_:1}),(0,l.Wm)(_,null,{default:(0,l.w5)((()=>[(0,l.Wm)(y,{type:"submit",loading:e.loading,color:"primary","text-color":"dark",label:""+("create"===e.mode?"Crear":"Modificar")},null,8,["loading","label"]),"update"===e.mode?((0,l.wg)(),(0,l.j4)(y,{key:0,loading:e.loading,color:"negative",label:"Eliminar",icon:"mdi-delete",onClick:o[3]||(o[3]=o=>e.remove(Number(e.form.id)))},null,8,["loading"])):(0,l.kq)("",!0)])),_:1})])),_:1},8,["onSubmit"])])),_:1})])),_:1},8,["modelValue"])])),_:1})}var s=a(1959),p=a(8825),f=a(9582),v=a(8872),b=a(1239);const g=(0,l.aZ)({name:"UsersPage",components:{"user-widget":(0,l.RC)((()=>a.e(635).then(a.bind(a,635))))},setup(){const e=(0,v.Ey)(v.Qw),o=(0,p.Z)(),a=(0,f.tv)(),{errorHandler:t}=(0,b.y)(o,a);(0,l.wF)((()=>{e.listAction().catch((e=>{t(e,"Error listando usuarios")}))}));const n=(0,s.iH)({email:"",name:"",phone:""}),u=(0,s.iH)(!1),r=(0,s.iH)("update"),i=(0,s.iH)(!1),d=(0,s.Fl)((()=>e.collaborators));function c(){r.value="create",n.value={email:"",name:"",phone:""},i.value=!0}function m(a){u.value=!0,e.deleteAction(a).then((()=>{o.notify({type:"positive",message:"Colaborador Eliminado",icon:"mdi-account-plus",position:"center"})})).catch((e=>{t(e,"Error eliminando colaborador")})).finally((()=>{i.value=!1,u.value=!1}))}function g(){u.value=!0,"create"===r.value?e.createAction(n.value).then((()=>{o.notify({type:"positive",message:"Colaborador creado",icon:"mdi-account-plus",position:"center"})})).catch((e=>{t(e,"Error creando colaborador")})).finally((()=>{i.value=!1,u.value=!1})):e.updateAction(Number(n.value.id),n.value).then((()=>{o.notify({type:"positive",message:"Colaborador Actualizado",icon:"mdi-account-plus",position:"center"})})).catch((e=>{t(e,"Error actualizando colaborador")})).finally((()=>{i.value=!1,u.value=!1}))}function w(e,o){r.value="update",n.value=o,i.value=!0}return{form:n,loading:u,mode:r,popup:i,users:d,create:c,onSubmit:g,remove:m,update:w}}});var w=a(4260),y=a(4379),_=a(151),C=a(5589),h=a(4554),W=a(6778),k=a(8689),q=a(4842),x=a(9367),V=a(2165),Z=a(7518),Q=a.n(Z);const E=(0,w.Z)(g,[["render",m]]),A=E;Q()(g,"components",{QPage:y.Z,QCard:_.Z,QCardSection:C.Z,QIcon:h.Z,QDialog:W.Z,QForm:k.Z,QInput:q.Z,QCardActions:x.Z,QBtn:V.Z})}}]);