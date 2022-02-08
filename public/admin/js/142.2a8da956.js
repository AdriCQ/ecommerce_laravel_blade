"use strict";(self["webpackChunkecommerce_admin"]=self["webpackChunkecommerce_admin"]||[]).push([[142],{4142:(e,l,a)=>{a.r(l),a.d(l,{default:()=>k});var o=a(3673),n=a(8880);const u=(0,o._)("div",{class:"text-h6 text-center"},"Cambiar Configuración",-1);function t(e,l,a,t,m,r){const i=(0,o.up)("q-card-section"),c=(0,o.up)("q-input"),d=(0,o.up)("q-btn"),s=(0,o.up)("q-card-actions"),p=(0,o.up)("q-form"),f=(0,o.up)("q-card");return(0,o.wg)(),(0,o.j4)(f,{class:"col-xs-12 col-sm-6"},{default:(0,o.w5)((()=>[(0,o.Wm)(i,null,{default:(0,o.w5)((()=>[u])),_:1}),(0,o.Wm)(p,{onSubmit:(0,n.iM)(e.onSubmit,["prevent"]),class:"q-gutter-md"},{default:(0,o.w5)((()=>[(0,o.Wm)(i,{class:"q-gutter-y-sm"},{default:(0,o.w5)((()=>[(0,o.Wm)(c,{modelValue:e.form.name,"onUpdate:modelValue":l[0]||(l[0]=l=>e.form.name=l),type:"text",label:"Nombre"},null,8,["modelValue"]),(0,o.Wm)(c,{modelValue:e.form.description,"onUpdate:modelValue":l[1]||(l[1]=l=>e.form.description=l),type:"textarea",label:"Descripción"},null,8,["modelValue"]),(0,o.Wm)(c,{modelValue:e.form.address,"onUpdate:modelValue":l[2]||(l[2]=l=>e.form.address=l),type:"text",label:"Dirección"},null,8,["modelValue"]),(0,o.Wm)(c,{modelValue:e.form.currency,"onUpdate:modelValue":l[3]||(l[3]=l=>e.form.currency=l),label:"Moneda"},null,8,["modelValue"]),(0,o.Wm)(c,{modelValue:e.form.email,"onUpdate:modelValue":l[4]||(l[4]=l=>e.form.email=l),type:"email",label:"Email"},null,8,["modelValue"]),(0,o.Wm)(c,{modelValue:e.form.phone,"onUpdate:modelValue":l[5]||(l[5]=l=>e.form.phone=l),type:"tel",label:"Teléfono 1"},null,8,["modelValue"]),(0,o.Wm)(c,{modelValue:e.form.phone_extra,"onUpdate:modelValue":l[6]||(l[6]=l=>e.form.phone_extra=l),type:"tel",label:"Teléfono 2"},null,8,["modelValue"])])),_:1}),(0,o.Wm)(i,null,{default:(0,o.w5)((()=>[(0,o.Wm)(c,{modelValue:e.form.social_facebook,"onUpdate:modelValue":l[7]||(l[7]=l=>e.form.social_facebook=l),label:"Facebook"},null,8,["modelValue"]),(0,o.Wm)(c,{modelValue:e.form.social_instagram,"onUpdate:modelValue":l[8]||(l[8]=l=>e.form.social_instagram=l),label:"Instagram"},null,8,["modelValue"]),(0,o.Wm)(c,{modelValue:e.form.social_youtube,"onUpdate:modelValue":l[9]||(l[9]=l=>e.form.social_youtube=l),label:"Youtube"},null,8,["modelValue"]),(0,o.Wm)(c,{modelValue:e.form.social_twitter,"onUpdate:modelValue":l[10]||(l[10]=l=>e.form.social_twitter=l),label:"Twitter"},null,8,["modelValue"])])),_:1}),(0,o.Wm)(i,null,{default:(0,o.w5)((()=>[(0,o.Wm)(c,{modelValue:e.appKey,"onUpdate:modelValue":l[11]||(l[11]=l=>e.appKey=l),label:"AppKey",readonly:""},null,8,["modelValue"])])),_:1}),(0,o.Wm)(s,null,{default:(0,o.w5)((()=>[(0,o.Wm)(d,{"text-color":"dark",loading:e.loading,color:"primary",type:"submit",label:"Guardar"},null,8,["loading"])])),_:1})])),_:1},8,["onSubmit"])])),_:1})}var m=a(1959),r=a(3333),i=a(8825),c=a(9582),d=a(1239),s=a(8872);const p=(0,o.aZ)({name:"ConfigForm",setup(){const e=(0,i.Z)(),l=(0,c.tv)(),{errorHandler:a}=(0,d.y)(e,l),n=(0,s.Ey)(s.xj);(0,o.wF)((()=>{n.getConfig().then((e=>{p.value=e.config,u.value=e.appKey})).catch((e=>{a(e,"No se pudo obtener la configuración")}))}));const u=(0,m.iH)(""),t=(0,m.Fl)((()=>n.config)),p=(0,m.iH)({address:"",currency:"CUP",email:"",name:"",open:!1,phone:"",phone_extra:"",description:"",social_facebook:null,social_instagram:null,social_twitter:null,social_youtube:null}),f=(0,m.iH)(!1);function b(){f.value=!0,""===p.value.social_facebook&&(p.value.social_facebook=null),""===p.value.social_youtube&&(p.value.social_youtube=null),""===p.value.social_instagram&&(p.value.social_instagram=null),""===p.value.social_twitter&&(p.value.social_twitter=null),n.updateConfig(p.value).then((l=>{e.notify({icon:"mdi-check",message:"Configuración actualizada",position:"center",type:"positive",actions:[{icon:"mdi-close",color:"white",handler:()=>{}}]}),(0,r.Z)({title:l.name})})).catch((e=>{console.log(e),a(e,"No se pudo actualizar la configuración")})).finally((()=>{f.value=!1}))}return{appKey:u,config:t,form:p,loading:f,onSubmit:b}}});var f=a(4260),b=a(151),V=a(5589),_=a(5269),g=a(8886),y=a(4842),v=a(9367),W=a(2165),w=a(7518),h=a.n(w);const U=(0,f.Z)(p,[["render",t]]),k=U;h()(p,"components",{QCard:b.Z,QCardSection:V.Z,QForm:_.Z,QToggle:g.Z,QInput:y.Z,QCardActions:v.Z,QBtn:W.Z})}}]);