(()=>{"use strict";var t={5987:(t,e,r)=>{r(5363),r(71);var o=r(8880),i=r(9592),n=r(3673);function a(t,e,r,o,i,a){const s=(0,n.up)("router-view");return(0,n.wg)(),(0,n.iD)("div",null,[(0,n.Wm)(s)])}var s=r(8872);const c=(0,n.aZ)({name:"App",setup(){(0,n.JJ)(s.pj,s.Up),(0,n.JJ)(s.xj,s.VT),(0,n.JJ)(s.Qw,s.HP)}});var l=r(4260);const d=(0,l.Z)(c,[["render",a]]),u=d;var p=r(269);async function h(t,e){const r="function"===typeof p.Z?await(0,p.Z)({}):p.Z,o=t(u);return o.use(i.Z,e),{app:o,router:r}}var f=r(5474),m=r(2147),v=r(4434);const w={config:{},iconSet:f.Z,plugins:{Dialog:m.Z,Notify:v.Z}},g="";async function y({app:t,router:e},r){let o=!1;const i=t=>{try{return e.resolve(t).href}catch(r){}return Object(t)===t?null:t},n=t=>{if(o=!0,"string"===typeof t&&/^https?:\/\//.test(t))return void(window.location.href=t);const e=i(t);null!==e&&(window.location.href=e,window.location.reload())},a=window.location.href.replace(window.location.origin,"");for(let c=0;!1===o&&c<r.length;c++)try{await r[c]({app:t,router:e,ssrContext:null,redirect:n,urlPath:a,publicPath:g})}catch(s){return s&&s.url?void n(s.url):void console.error("[Quasar] boot error:",s)}!0!==o&&(t.use(e),t.mount("#q-app"))}h(o.ri,w).then((t=>Promise.all([Promise.resolve().then(r.bind(r,1768))]).then((e=>{const r=e.map((t=>t.default)).filter((t=>"function"===typeof t));y(t,r)}))))},1768:(t,e,r)=>{r.r(e),r.d(e,{baseURL:()=>c,default:()=>d,api:()=>l});var o=r(7083),i=r(52),n=r.n(i),a=r(8872);let s="https://ustora.expresscuba.com";{const t=window.location;"localhost"!==t.hostname&&(s=t.origin)}const c=s,l=n().create({baseURL:`${c}/api`,timeout:3e4,timeoutErrorMessage:"Error en la red"}),d=(0,o.xr)((({app:t})=>{a.HP.load(),console.log({profile:a.HP.profile,apiToken:a.HP.apiToken}),l.interceptors.request.use((t=>{if(t.headers["Content-Type"]||(t.headers["Content-Type"]="application/json"),!t.headers["Authorization"]){const e=a.HP.apiToken;e&&e.length>0?t.headers.Authorization="Bearer "+e:t.headers.Authorization="Bearer ApiToken"}return t})),t.config.globalProperties.$axios=n(),t.config.globalProperties.$api=l}))},1239:(t,e,r)=>{r.d(e,{N:()=>a,y:()=>n});var o=r(269),i=r(8872);function n(t,e){function r(e){t.dialog({title:e.title,message:e.message,ok:!0,cancel:!0}).onOk((()=>{e.onOk()}))}function n(r,n="Ha ocurrido un error"){console.log({_error:r}),r&&r.response&&r.response.data?401===r.response.status?(t.notify({type:"negative",icon:"mdi-alert-circle-outline",message:n,position:"center",actions:[{icon:"mdi-close",color:"white",handler:()=>{}}]}),i.HP.logout(),e&&e.push({name:o.I.LOGIN})):t.notify({type:"negative",icon:"mdi-alert-circle-outline",message:n,position:"center",actions:[{icon:"mdi-close",color:"white",handler:()=>{}}]}):t.notify({type:"negative",icon:"mdi-alert-circle-outline",message:n,position:"center"})}return{errorHandler:n,deleteDialog:r}}function a(t){const e=new jsSHA("SHA-512","TEXT",{encoding:"UTF8"});return e.update(t),e.getHash("HEX")}},8872:(t,e,r)=>{r.d(e,{pj:()=>s,Up:()=>a,Ey:()=>_,xj:()=>h,VT:()=>p,Qw:()=>y,HP:()=>g});var o=r(3673),i=r(1959);class n{constructor(){this._leftDrawer=(0,i.iH)(!1),this._redirect=null}get leftDrawer(){return this._leftDrawer.value}set leftDrawer(t){this._leftDrawer.value=t}get redirect(){return this._redirect}set redirect(t){this._redirect=t}toggleLeftDrawer(){this._leftDrawer.value=!this._leftDrawer.value}}const a=new n,s=Symbol("App");var c=r(1768);class l{constructor(){this.BASE_PATH="/shop",this.CONFIGS_PATH="/configs",this.DESTINATION_PATH="/destinations",this.ORDERS_PATH="/orders",this.PRODUCT_PATH="/products"}getConfig(){return c.api.get(this.CONFIGS_PATH)}updateConfig(t){return c.api.post(this.CONFIGS_PATH,t)}createDestination(t){return c.api.post(this.DESTINATION_PATH,t)}deleteDestination(t){return c.api["delete"](`${this.DESTINATION_PATH}/${t}`)}listDestination(){return c.api.get(this.DESTINATION_PATH)}updateDestination(t,e){return c.api.put(`${this.DESTINATION_PATH}/${t}`,e)}createProduct(t){return c.api.post(this.PRODUCT_PATH,t)}deleteProduct(t){return c.api["delete"](`${this.PRODUCT_PATH}/${t}`)}listProduct(){return c.api.get(this.PRODUCT_PATH)}updateProduct(t,e){return c.api.put(`${this.PRODUCT_PATH}/${t}`,e)}listOrders(){return c.api.get(this.ORDERS_PATH)}removeOrder(t){return c.api["delete"](this.ORDERS_PATH+`/${t}`)}removeAllOrders(){return c.api["delete"](this.ORDERS_PATH)}removeProductGallery(t){return c.api["delete"](`${this.PRODUCT_PATH}/${t}/gallery`)}}var d=function(t,e,r,o){function i(t){return t instanceof r?t:new r((function(e){e(t)}))}return new(r||(r=Promise))((function(r,n){function a(t){try{c(o.next(t))}catch(e){n(e)}}function s(t){try{c(o["throw"](t))}catch(e){n(e)}}function c(t){t.done?r(t.value):i(t.value).then(a,s)}c((o=o.apply(t,e||[])).next())}))};class u{constructor(){this.$service=new l,this._config=(0,i.iH)({address:"",currency:"CUP",email:"",name:"",open:!1,phone:"",description:"",phone_extra:"",social_facebook:null,social_instagram:null,social_twitter:null,social_youtube:null,cp_bitcoin:null,cp_ethereum:null,cp_litecoin:null,cp_ripple:null}),this._destinations=(0,i.iH)([]),this._orders=(0,i.iH)([]),this._products=(0,i.iH)([])}get config(){return this._config.value}set config(t){this._config.value=t}get destinations(){return this._destinations.value}set destinations(t){this._destinations.value=t}get orders(){return this._orders.value}set orders(t){this._orders.value=t}get products(){return this._products.value}set products(t){this._products.value=t}getConfig(){return d(this,void 0,void 0,(function*(){try{const t=yield this.$service.getConfig();return this.config=t.data.config,this.config.open=Boolean(this.config.open),t.data}catch(t){throw t}}))}updateConfig(t){return d(this,void 0,void 0,(function*(){try{const e=yield this.$service.updateConfig(t);return this.config=e.data,this.config}catch(e){throw e}}))}createDestination(t){return d(this,void 0,void 0,(function*(){try{const e=yield this.$service.createDestination(t);return this.destinations.push(e.data),e.data}catch(e){throw e}}))}listDestination(){return d(this,void 0,void 0,(function*(){try{const t=yield this.$service.listDestination();return this.destinations=t.data,this.destinations}catch(t){throw t}}))}deleteDestination(t){return d(this,void 0,void 0,(function*(){try{yield this.$service.deleteDestination(t);const e=this.destinations.findIndex((e=>e.id===t));return this.destinations.splice(e,1)}catch(e){throw e}}))}updateDestination(t,e){return d(this,void 0,void 0,(function*(){try{const r=yield this.$service.updateDestination(t,e),o=this.destinations.findIndex((e=>e.id===t));return this.destinations[o]=r.data,r.data}catch(r){throw r}}))}findProductById(t){return this.products.find((e=>e.id===t))}createProductAction(t){return d(this,void 0,void 0,(function*(){try{const e=yield this.$service.createProduct(t);return this.products.unshift(e.data),e.data}catch(e){throw e}}))}deleteProductAction(t){return d(this,void 0,void 0,(function*(){try{yield this.$service.deleteProduct(t);const e=this.products.findIndex((e=>e.id===t));this.products.splice(e,1),this.products=JSON.parse(JSON.stringify(this.products))}catch(e){throw e}}))}deleteProductGallery(t){return d(this,void 0,void 0,(function*(){try{yield this.$service.removeProductGallery(t)}catch(e){throw e}}))}listProductsAction(){return d(this,void 0,void 0,(function*(){try{const t=yield this.$service.listProduct();return this.products=t.data,this.products}catch(t){throw t}}))}updateProductAction(t){return d(this,void 0,void 0,(function*(){try{const e=Number(t.id),r=yield this.$service.updateProduct(e,t);return this.updateProduct(e,t),r.data}catch(e){throw e}}))}updateProduct(t,e){const r=this.products.findIndex((e=>e.id===t));this.products[r]=e}listOrderAction(){return d(this,void 0,void 0,(function*(){try{const t=yield this.$service.listOrders();return this.orders=t.data,this.orders}catch(t){throw t}}))}removeOrder(t){return d(this,void 0,void 0,(function*(){try{yield this.$service.removeOrder(t);const e=this.orders.findIndex((e=>e.id===t));this.orders.splice(e,1),this.orders=this.orders}catch(e){throw e}}))}removeAllOrders(){return d(this,void 0,void 0,(function*(){try{yield this.$service.removeAllOrders(),this.orders=[]}catch(t){throw t}}))}}const p=new u,h=Symbol("ShopStore");var f=r(6395);class m{constructor(){this.BASE_PATH="/users"}create(t){return c.api.post(this.BASE_PATH,t)}delete(t){return c.api["delete"](`${this.BASE_PATH}/${t}`)}list(){return c.api.get(this.BASE_PATH)}login(t){return c.api.post(this.BASE_PATH+"/login",t)}update(t,e){return c.api.put(`${this.BASE_PATH}/${t}`,e)}updatePassword(t){return c.api.post(`${this.BASE_PATH}/update-password`,t)}}var v=function(t,e,r,o){function i(t){return t instanceof r?t:new r((function(e){e(t)}))}return new(r||(r=Promise))((function(r,n){function a(t){try{c(o.next(t))}catch(e){n(e)}}function s(t){try{c(o["throw"](t))}catch(e){n(e)}}function c(t){t.done?r(t.value):i(t.value).then(a,s)}c((o=o.apply(t,e||[])).next())}))};class w{constructor(){this.$service=new m,this._apiToken=(0,i.iH)(null),this._collaborators=(0,i.iH)([]),this._profile=(0,i.iH)({email:"",name:"",type:"ADMIN"})}get apiToken(){return this._apiToken.value}set apiToken(t){this._apiToken.value=t}get collaborators(){return this._collaborators.value}set collaborators(t){this._collaborators.value=t}get isAuth(){return Boolean(this.apiToken)}get profile(){return this._profile.value}set profile(t){this._profile.value=t}createAction(t){return v(this,void 0,void 0,(function*(){try{const e=yield this.$service.create(t);return this.collaborators.push(e.data),e.data}catch(e){throw e}}))}deleteAction(t){return v(this,void 0,void 0,(function*(){try{const e=yield this.$service.delete(t),r=this.collaborators.findIndex((e=>e.id===t));return this.collaborators.splice(r,1),e.data}catch(e){throw e}}))}listAction(){return v(this,void 0,void 0,(function*(){try{const t=yield this.$service.list();return this.collaborators=t.data,t.data}catch(t){throw t}}))}loginAction(t){return v(this,void 0,void 0,(function*(){try{const e=yield this.$service.login(t);return this.apiToken=e.data.api_token,this.profile=e.data.profile,this.save(),e.data}catch(e){throw e}}))}updateAction(t,e){return v(this,void 0,void 0,(function*(){try{const r=yield this.$service.update(t,e),o=this.collaborators.findIndex((e=>t===e.id));return this.collaborators[o]=r.data,r.data}catch(r){throw r}}))}updatePasswordAction(t){return v(this,void 0,void 0,(function*(){try{yield this.$service.updatePassword(t),this.logout()}catch(e){throw e}}))}load(){var t;const e="store/User";if(f.Z.has(e)){const r=null===(t=f.Z.getItem(e))||void 0===t?void 0:t.toString();if(r){const t=JSON.parse(r);this.profile=t.profile,this.apiToken=t.api_token}}}logout(){this.apiToken=null,this.profile={type:"ADMIN",email:"",name:""},this.save()}save(){f.Z.set("store/User",JSON.stringify({profile:this.profile,api_token:this.apiToken}))}}const g=new w,y=Symbol("UserStore");function _(t,e){const r=(0,o.f3)(t,e);if(!r)throw new Error(`Could not resolve ${t.toString()}`);return r}},269:(t,e,r)=>{r.d(e,{I:()=>X,Z:()=>nt});var o=r(7083),i=r(9582),n=r(3673);function a(t,e,r,o,i,a){const s=(0,n.up)("app-header"),c=(0,n.up)("router-view"),l=(0,n.up)("q-page-container"),d=(0,n.up)("left-drawer"),u=(0,n.up)("q-layout");return(0,n.wg)(),(0,n.j4)(u,{view:"lHh lpR fFf"},{default:(0,n.w5)((()=>[(0,n.Wm)(s),(0,n.Wm)(l,null,{default:(0,n.w5)((()=>[(0,n.Wm)(c)])),_:1}),(0,n.Wm)(d)])),_:1})}var s=r(3333),c=r(8825),l=r(8872),d=r(2323);function u(t,e,r,o,i,a){const s=(0,n.up)("q-btn"),c=(0,n.up)("q-toolbar-title"),l=(0,n.up)("q-toolbar"),u=(0,n.up)("q-route-tab"),p=(0,n.up)("q-tabs"),h=(0,n.up)("q-header");return(0,n.wg)(),(0,n.j4)(h,{elevated:"",class:"bg-primary text-dark","height-hint":"98"},{default:(0,n.w5)((()=>[(0,n.Wm)(l,null,{default:(0,n.w5)((()=>[(0,n.Wm)(s,{dense:"",flat:"",round:"",icon:"mdi-menu",onClick:t.toggleLeftDrawer},null,8,["onClick"]),(0,n.Wm)(c,null,{default:(0,n.w5)((()=>[(0,n.Uk)((0,d.zw)(t.appConfig.name),1)])),_:1})])),_:1}),(0,n.Wm)(p,{align:"left"},{default:(0,n.w5)((()=>[(0,n.Wm)(u,{to:{name:t.ROUTE_NAME.MAIN},label:"Pedidos"},null,8,["to"]),(0,n.Wm)(u,{to:{name:t.ROUTE_NAME.PRODUCTS},label:"Productos"},null,8,["to"]),(0,n.Wm)(u,{to:{name:t.ROUTE_NAME.DESTINATIONS},label:"Destinos"},null,8,["to"])])),_:1})])),_:1})}var p=r(1959);const h=(0,n.aZ)({name:"AppHeader",setup(){const t=(0,l.Ey)(l.pj),e=(0,l.Ey)(l.xj),r=(0,p.Fl)((()=>t.leftDrawer)),o=(0,p.Fl)((()=>e.config));function i(){t.toggleLeftDrawer()}return{leftDrawer:r,appConfig:o,ROUTE_NAME:X,toggleLeftDrawer:i}}});var f=r(4260),m=r(3812),v=r(9570),w=r(2165),g=r(3747),y=r(5096),_=r(7547),T=r(208),b=r(7518),P=r.n(b);const A=(0,f.Z)(h,[["render",u]]),O=A;P()(h,"components",{QHeader:m.Z,QToolbar:v.Z,QBtn:w.Z,QToolbarTitle:g.Z,QAvatar:y.Z,QTabs:_.Z,QRouteTab:T.Z});const D={class:"text-center q-mt-md"},E={class:"text-grey-9 text-body1"},S={class:"q-gutter-sm q-mt-md"},N=(0,n.Uk)("Pedidos"),k=(0,n.Uk)("Productos"),I=(0,n.Uk)("Destinos"),H=(0,n.Uk)("Colaboradores"),C=(0,n.Uk)("Ajustes"),U=(0,n.Uk)("Salir");function x(t,e,r,o,i,a){const s=(0,n.up)("q-avatar"),c=(0,n.up)("q-item-section"),l=(0,n.up)("q-item-label"),u=(0,n.up)("q-item"),p=(0,n.up)("q-list"),h=(0,n.up)("q-drawer"),f=(0,n.Q2)("ripple");return(0,n.wg)(),(0,n.j4)(h,{"model-value":t.sidebarOpen,"onUpdate:modelValue":t.updateSidebarOpen,"show-if-above":"",side:"left",width:280},{default:(0,n.w5)((()=>[(0,n._)("div",D,[(0,n._)("div",E,"Hola, "+(0,d.zw)(t.userProfile.name),1)]),(0,n._)("div",S,[(0,n.Wm)(p,{class:"rounded-borders",style:{"max-width":"350px"}},{default:(0,n.w5)((()=>[(0,n.wy)(((0,n.wg)(),(0,n.j4)(u,{clickable:"",to:{name:t.ROUTE_NAME.MAIN}},{default:(0,n.w5)((()=>[(0,n.Wm)(c,{avatar:"",top:""},{default:(0,n.w5)((()=>[(0,n.Wm)(s,{size:"md",icon:"mdi-cart-outline",color:"primary","text-color":"dark"})])),_:1}),(0,n.Wm)(c,{class:"text-grey-9"},{default:(0,n.w5)((()=>[(0,n.Wm)(l,{lines:"1"},{default:(0,n.w5)((()=>[N])),_:1})])),_:1})])),_:1},8,["to"])),[[f]]),(0,n.wy)(((0,n.wg)(),(0,n.j4)(u,{clickable:"",to:{name:t.ROUTE_NAME.PRODUCTS}},{default:(0,n.w5)((()=>[(0,n.Wm)(c,{avatar:"",top:""},{default:(0,n.w5)((()=>[(0,n.Wm)(s,{size:"md",icon:"mdi-cube",color:"primary","text-color":"dark"})])),_:1}),(0,n.Wm)(c,{class:"text-grey-9"},{default:(0,n.w5)((()=>[(0,n.Wm)(l,{lines:"1"},{default:(0,n.w5)((()=>[k])),_:1})])),_:1})])),_:1},8,["to"])),[[f]]),(0,n.wy)(((0,n.wg)(),(0,n.j4)(u,{clickable:"",to:{name:t.ROUTE_NAME.DESTINATIONS}},{default:(0,n.w5)((()=>[(0,n.Wm)(c,{avatar:"",top:""},{default:(0,n.w5)((()=>[(0,n.Wm)(s,{size:"md",icon:"mdi-map-marker-outline",color:"primary","text-color":"dark"})])),_:1}),(0,n.Wm)(c,{class:"text-grey-9"},{default:(0,n.w5)((()=>[(0,n.Wm)(l,{lines:"1"},{default:(0,n.w5)((()=>[I])),_:1})])),_:1})])),_:1},8,["to"])),[[f]]),(0,n.wy)(((0,n.wg)(),(0,n.j4)(u,{clickable:"",to:{name:t.ROUTE_NAME.USERS}},{default:(0,n.w5)((()=>[(0,n.Wm)(c,{avatar:"",top:""},{default:(0,n.w5)((()=>[(0,n.Wm)(s,{size:"md",icon:"mdi-account-multiple",color:"primary","text-color":"dark"})])),_:1}),(0,n.Wm)(c,{class:"text-grey-9"},{default:(0,n.w5)((()=>[(0,n.Wm)(l,{lines:"1"},{default:(0,n.w5)((()=>[H])),_:1})])),_:1})])),_:1},8,["to"])),[[f]]),(0,n.wy)(((0,n.wg)(),(0,n.j4)(u,{clickable:"",to:{name:t.ROUTE_NAME.CONFIG}},{default:(0,n.w5)((()=>[(0,n.Wm)(c,{avatar:"",top:""},{default:(0,n.w5)((()=>[(0,n.Wm)(s,{size:"md",icon:"mdi-wrench",color:"primary","text-color":"dark"})])),_:1}),(0,n.Wm)(c,{class:"text-grey-9"},{default:(0,n.w5)((()=>[(0,n.Wm)(l,{lines:"1"},{default:(0,n.w5)((()=>[C])),_:1})])),_:1})])),_:1},8,["to"])),[[f]]),(0,n.wy)(((0,n.wg)(),(0,n.j4)(u,{clickable:"",onClick:t.logout},{default:(0,n.w5)((()=>[(0,n.Wm)(c,{avatar:"",top:""},{default:(0,n.w5)((()=>[(0,n.Wm)(s,{size:"md",icon:"mdi-exit-to-app",color:"primary","text-color":"dark"})])),_:1}),(0,n.Wm)(c,{class:"text-grey-9"},{default:(0,n.w5)((()=>[(0,n.Wm)(l,{lines:"1"},{default:(0,n.w5)((()=>[U])),_:1})])),_:1})])),_:1},8,["onClick"])),[[f]])])),_:1})])])),_:1},8,["model-value","onUpdate:modelValue"])}const R=(0,n.aZ)({name:"LeftDrawer",setup(){const t=(0,l.Ey)(l.pj),e=(0,l.Ey)(l.Qw),r=(0,i.tv)(),o=(0,p.Fl)((()=>e.profile)),n=(0,p.Fl)((()=>t.leftDrawer));function a(e){t.leftDrawer=e}function s(){e.logout(),r.push({name:X.LOGIN})}return{sidebarOpen:n,ROUTE_NAME:X,userProfile:o,updateSidebarOpen:a,logout:s}}});var $=r(6873),Z=r(7011),W=r(3414),j=r(2035),q=r(2350),L=r(6489);const M=(0,f.Z)(R,[["render",x]]),Q=M;P()(R,"components",{QDrawer:$.Z,QList:Z.Z,QItem:W.Z,QItemSection:j.Z,QAvatar:y.Z,QItemLabel:q.Z}),P()(R,"directives",{Ripple:L.Z});var B=r(1239);const F=(0,n.aZ)({name:"MainLayout",components:{AppHeader:O,LeftDrawer:Q},setup(){const t=(0,l.Ey)(l.xj),e=(0,i.tv)(),r=(0,c.Z)(),{errorHandler:o}=(0,B.y)(r,e);(0,n.wF)((()=>{t.getConfig().then((t=>{(0,s.Z)({title:t.config.name})})).catch((t=>{o(t,"No hay conexión con el servidor")}))}))}});var G=r(3066),z=r(2652);const J=(0,f.Z)(F,[["render",a]]),V=J;var X;function K(t,e,r,o,i,a){const s=(0,n.up)("router-view"),c=(0,n.up)("q-page-container"),l=(0,n.up)("q-layout");return(0,n.wg)(),(0,n.j4)(l,{view:"hHh lpR lFf"},{default:(0,n.w5)((()=>[(0,n.Wm)(c,{class:"bg-grey-9"},{default:(0,n.w5)((()=>[(0,n.Wm)(s)])),_:1})])),_:1})}P()(F,"components",{QLayout:G.Z,QPageContainer:z.Z}),function(t){t["CONFIG"]="APP.CONFIG",t["DESTINATIONS"]="APP.DESTINATIONS",t["LOGIN"]="AUTH.LOGIN",t["MAIN"]="MAIN",t["PRODUCTS"]="PRODUCTS",t["PRODUCT_EDIT"]="PRODUCT_EDIT",t["USERS"]="USERS"}(X||(X={}));const Y=(0,n.aZ)({name:"AuthLayout"}),tt=(0,f.Z)(Y,[["render",K]]),et=tt;P()(Y,"components",{QLayout:G.Z,QPageContainer:z.Z});const rt=(t,e,r)=>{l.HP.isAuth?r():(l.Up.redirect={name:t.name,path:t.path,query:t.query},r({name:X.LOGIN}))},ot=[{path:"/",component:V,beforeEnter:rt,children:[{name:X.MAIN,path:"",component:()=>Promise.all([r.e(736),r.e(206)]).then(r.bind(r,1206))},{name:X.CONFIG,path:"config",component:()=>Promise.all([r.e(736),r.e(552)]).then(r.bind(r,5552))},{name:X.DESTINATIONS,path:"destinations",component:()=>Promise.all([r.e(736),r.e(753)]).then(r.bind(r,7753))},{name:X.PRODUCTS,path:"product",component:()=>Promise.all([r.e(736),r.e(639)]).then(r.bind(r,5639))},{name:X.PRODUCT_EDIT,path:"product/:id",component:()=>Promise.all([r.e(736),r.e(154)]).then(r.bind(r,8154))},{name:X.USERS,path:"users",component:()=>Promise.all([r.e(736),r.e(470)]).then(r.bind(r,1470))}]},{path:"/login",component:et,children:[{name:X.LOGIN,path:"",component:()=>Promise.all([r.e(736),r.e(790)]).then(r.bind(r,9077))}]},{path:"/:catchAll(.*)*",component:()=>r.e(293).then(r.bind(r,7293))}],it=ot,nt=(0,o.BC)((function(){const t=i.r5,e=(0,i.p7)({scrollBehavior:()=>({left:0,top:0}),routes:it,history:t("")});return e}))}},e={};function r(o){var i=e[o];if(void 0!==i)return i.exports;var n=e[o]={exports:{}};return t[o](n,n.exports,r),n.exports}r.m=t,(()=>{var t=[];r.O=(e,o,i,n)=>{if(!o){var a=1/0;for(d=0;d<t.length;d++){for(var[o,i,n]=t[d],s=!0,c=0;c<o.length;c++)(!1&n||a>=n)&&Object.keys(r.O).every((t=>r.O[t](o[c])))?o.splice(c--,1):(s=!1,n<a&&(a=n));if(s){t.splice(d--,1);var l=i();void 0!==l&&(e=l)}}return e}n=n||0;for(var d=t.length;d>0&&t[d-1][2]>n;d--)t[d]=t[d-1];t[d]=[o,i,n]}})(),(()=>{r.n=t=>{var e=t&&t.__esModule?()=>t["default"]:()=>t;return r.d(e,{a:e}),e}})(),(()=>{r.d=(t,e)=>{for(var o in e)r.o(e,o)&&!r.o(t,o)&&Object.defineProperty(t,o,{enumerable:!0,get:e[o]})}})(),(()=>{r.f={},r.e=t=>Promise.all(Object.keys(r.f).reduce(((e,o)=>(r.f[o](t,e),e)),[]))})(),(()=>{r.u=t=>"js/"+t+"."+{58:"3daea4e5",77:"fded9531",154:"037e99dc",206:"d520b27e",293:"3907cfdd",386:"04ffd20d",450:"75189ba5",470:"99b54075",484:"4d57f027",552:"3bc099e8",623:"eb1c2a10",629:"a0e542b7",639:"4ef17231",753:"d6e5b110",790:"c4969544",906:"77e712d7"}[t]+".js"})(),(()=>{r.miniCssF=t=>"css/"+{143:"app",736:"vendor"}[t]+"."+{143:"31d6cfe0",736:"35185bd5"}[t]+".css"})(),(()=>{r.g=function(){if("object"===typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(t){if("object"===typeof window)return window}}()})(),(()=>{r.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e)})(),(()=>{var t={},e="ecommerce-admin:";r.l=(o,i,n,a)=>{if(t[o])t[o].push(i);else{var s,c;if(void 0!==n)for(var l=document.getElementsByTagName("script"),d=0;d<l.length;d++){var u=l[d];if(u.getAttribute("src")==o||u.getAttribute("data-webpack")==e+n){s=u;break}}s||(c=!0,s=document.createElement("script"),s.charset="utf-8",s.timeout=120,r.nc&&s.setAttribute("nonce",r.nc),s.setAttribute("data-webpack",e+n),s.src=o),t[o]=[i];var p=(e,r)=>{s.onerror=s.onload=null,clearTimeout(h);var i=t[o];if(delete t[o],s.parentNode&&s.parentNode.removeChild(s),i&&i.forEach((t=>t(r))),e)return e(r)},h=setTimeout(p.bind(null,void 0,{type:"timeout",target:s}),12e4);s.onerror=p.bind(null,s.onerror),s.onload=p.bind(null,s.onload),c&&document.head.appendChild(s)}}})(),(()=>{r.r=t=>{"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})}})(),(()=>{r.p=""})(),(()=>{var t={143:0};r.f.j=(e,o)=>{var i=r.o(t,e)?t[e]:void 0;if(0!==i)if(i)o.push(i[2]);else{var n=new Promise(((r,o)=>i=t[e]=[r,o]));o.push(i[2]=n);var a=r.p+r.u(e),s=new Error,c=o=>{if(r.o(t,e)&&(i=t[e],0!==i&&(t[e]=void 0),i)){var n=o&&("load"===o.type?"missing":o.type),a=o&&o.target&&o.target.src;s.message="Loading chunk "+e+" failed.\n("+n+": "+a+")",s.name="ChunkLoadError",s.type=n,s.request=a,i[1](s)}};r.l(a,c,"chunk-"+e,e)}},r.O.j=e=>0===t[e];var e=(e,o)=>{var i,n,[a,s,c]=o,l=0;if(a.some((e=>0!==t[e]))){for(i in s)r.o(s,i)&&(r.m[i]=s[i]);if(c)var d=c(r)}for(e&&e(o);l<a.length;l++)n=a[l],r.o(t,n)&&t[n]&&t[n][0](),t[a[l]]=0;return r.O(d)},o=self["webpackChunkecommerce_admin"]=self["webpackChunkecommerce_admin"]||[];o.forEach(e.bind(null,0)),o.push=e.bind(null,o.push.bind(o))})();var o=r.O(void 0,[736],(()=>r(5987)));o=r.O(o)})();