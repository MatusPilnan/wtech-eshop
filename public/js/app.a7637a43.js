(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["app"],{0:function(t,e,a){t.exports=a("2f39")},"034f":function(t,e,a){"use strict";var o=a("fb1c"),n=a.n(o);n.a},"1e5d":function(t,e,a){},"2f39":function(t,e,a){"use strict";a.r(e);var o={};a.r(o),a.d(o,"updateCategories",function(){return N});a("ac6a"),a("4a91"),a("a114"),a("d14b"),a("1e5d"),a("7e6d");var n=a("2b0e"),r=a("e84f"),c=a("7051"),i=a("2040"),u=a("cf12"),s=a("46a9"),l=a("32a1"),p=a("f30c"),d=a("ce67"),f=a("482e"),h=a("52b5"),m=a("1180"),g=a("1e55"),b=a("506f"),v=a("b8d9"),_=a("7d43"),q=a("9541"),y=a("ac83"),k=a("866b"),w=a("5d8b"),Q=a("79e9"),$=a("5931"),x=a("1526"),I=a("133b"),O=a("6780");n["a"].use(r["a"],{config:{},components:{QLayout:c["a"],QLayoutHeader:i["a"],QLayoutDrawer:u["a"],QPageContainer:s["a"],QPage:l["a"],QToolbar:p["a"],QToolbarTitle:d["a"],QBtn:f["a"],QIcon:h["a"],QList:m["a"],QListHeader:g["a"],QItem:b["a"],QItemMain:v["a"],QItemSide:_["a"],QItemTile:q["a"],QCollapsible:y["a"],QAjaxBar:k["a"],QInput:w["a"],QField:Q["a"],QSelect:$["a"]},directives:{Ripple:x["a"]},plugins:{Notify:I["a"],Dialog:O["a"]}});var P=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"q-app"}},[a("router-view")],1)},C=[];P._withStripped=!0;var E={name:"App"},z=E,j=(a("034f"),a("2877")),A=Object(j["a"])(z,P,C,!1,null,null,null);A.options.__file="App.vue";var D=A.exports,L=a("2f62"),S={catalog:{categories:[]}},V=a("cf3c"),N=function(t,e){t.catalog.categories=e},M=a("7a39"),T={namespaced:!0,state:S,getters:V,mutations:o,actions:M};n["a"].use(L["a"]);var B=function(){var t=new L["a"].Store({modules:{moduleCatalog:T}});return t},U=a("8c4f"),H=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-layout",[a("q-layout-header",{attrs:{reveal:""}},[a("q-toolbar",{attrs:{color:"dark"}},[a("q-btn",{attrs:{flat:"",dense:"",to:"/"}},[a("img",{attrs:{src:"http://localhost:8000/img/logo2.png",alt:"LOGO"}}),a("q-toolbar-title",[t._v("\n          Zóna Administrátorov\n        ")])],1),a("q-btn",{attrs:{flat:"",dense:""},on:{click:function(e){t.$router.push({name:"add",params:{productID:-1}})}}},[t._v("\n        Pridať produkt\n      ")])],1)],1),a("q-page-container",[a("router-view"),a("q-ajax-bar",{attrs:{color:"primary"}})],1)],1)},J=[];H._withStripped=!0;var R={},Z=Object(j["a"])(R,H,J,!1,null,null,null);Z.options.__file="Main.vue";var F=Z.exports,G=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-page",{attrs:{padding:""}},[a("q-list",{attrs:{highlight:"",separator:""}},[a("q-list-header",[t._v("Zoznam produktov")]),t._l(t.categories,function(e){return a("q-collapsible",{key:e.name,attrs:{group:"cat",label:e.name}},t._l(e.subcategories,function(e){return a("q-collapsible",{key:e.name,attrs:{separator:"",group:"subcat",label:e.name}},t._l(e.products,function(e){return a("q-item",{key:e.name,attrs:{dense:"",highlight:"",separator:""}},[a("q-item-side",{attrs:{image:t.getMiniImg(e)}}),a("q-item-main",{attrs:{label:e.name,sublabel:e.long_desc,"sublabel-lines":2}},[a("q-item-tile",[t._v("\n              "+t._s(e.price)+" €\n            ")])],1),a("q-item-side",{attrs:{right:""}},[a("q-btn",{attrs:{push:"",color:"warning",label:"Upraviť",icon:"edit"},on:{click:function(a){t.$router.push({name:"add",params:{productID:e.id}})}}}),a("q-btn",{attrs:{push:"",color:"negative",label:"Vymazať",icon:"delete"},on:{click:function(a){t.destroy(e.id,e.name)}}})],1)],1)}))}))})],2)],1)},K=[];G._withStripped=!0;var W=a("bc3a"),X=a.n(W),Y={data:function(){return{manufacturers:[],categories:[]}},methods:{getMiniImg:function(t){var e="http://localhost:8000/img/logo.png";return t.all_images.forEach(function(t){!0===t.mini&&(e="http://localhost:8000/"+t.file)}),e},destroy:function(t,e){var a=this;this.$q.dialog({title:"Vymazanie produktu",message:"Naozaj chcete vymazat produkt "+e+"?",color:"warning",ok:!0,cancel:!0}).then(function(){X.a.delete("http://localhost:8000/products/".concat(t)).then(function(t){a.showNotification("Produkt uspesne vymazany","positive",e)}).catch(function(){})}).catch(function(){})},showNotification:function(t,e,a){this.$q.notify({message:t,timeout:1e3,color:e,detail:a,position:"center"})},updateCatalog:function(){}},created:function(){var t=this;X.a.get("http://localhost:8000/products/list").then(function(e){t.$store.commit("moduleCatalog/updateCategories",e.data),t.categories=e.data}).catch(function(e){t.errors.push(e)})}},tt=Y,et=Object(j["a"])(tt,G,K,!1,null,null,null);et.options.__file="Products.vue";var at=et.exports,ot=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-page",{attrs:{padding:""}},[a("h1",[t._v("Pridanie/úprava produktu")]),a("form",[a("q-select",{attrs:{"float-label":"Podkategória",options:t.subcategoryOptions},model:{value:t.product.subcategory_id,callback:function(e){t.$set(t.product,"subcategory_id",e)},expression:"product.subcategory_id"}}),a("q-field",{attrs:{count:255}},[a("q-input",{attrs:{"float-label":"Názov produktu"},model:{value:t.product.name,callback:function(e){t.$set(t.product,"name",e)},expression:"product.name"}})],1),a("q-field",{attrs:{count:255}},[a("q-input",{attrs:{"float-label":"Krátky popis produktu"},model:{value:t.product.short_desc,callback:function(e){t.$set(t.product,"short_desc",e)},expression:"product.short_desc"}})],1),a("q-input",{attrs:{"float-label":"Podrobný opis produktu",type:"textarea"},model:{value:t.product.long_desc,callback:function(e){t.$set(t.product,"long_desc",e)},expression:"product.long_desc"}}),a("q-input",{attrs:{"float-label":"Cena produktu",type:"number",decimals:2,align:"right",suffix:" EUR"},model:{value:t.product.price,callback:function(e){t.$set(t.product,"price",e)},expression:"product.price"}}),a("q-select",{attrs:{"float-label":"Výrobca",options:t.manufacturerOptions},model:{value:t.product.manufacturer_id,callback:function(e){t.$set(t.product,"manufacturer_id",e)},expression:"product.manufacturer_id"}}),a("q-btn",{attrs:{label:"Uložiť"},on:{click:t.save}}),t._v("\n    "+t._s(t.product)+"\n  ")],1)])},nt=[];ot._withStripped=!0;a("7f7f");var rt={data:function(){return{manufacturers:[],subcategories:[],product:{}}},computed:{manufacturerOptions:function(){var t=[];return this.manufacturers.forEach(function(e){t.push({label:e.name,value:e.id})}),t},categoryOptions:function(){var t=[];return this.$store.state.moduleCatalog.catalog.categories.forEach(function(e){t.push({label:e.name,value:e.id})}),[]},subcategoryOptions:function(){var t=[];return this.subcategories.forEach(function(e){t.push({label:e.name,value:e.id})}),t}},props:{productID:{default:-1}},methods:{save:function(t){var e=this;X.a.post("http://localhost:8000/products",this.product).then(function(t){e.$q.notify({message:"Produkt uspesne ulozeny",color:"success",timeout:1e3,position:"center"})}).catch(function(t){e.$q.notify({message:"Produkt sa nepodarilo ulozit",color:"negative",timeout:1e3,position:"center"})})}},created:function(){var t=this;X.a.get("http://localhost:8000/subcategories/list").then(function(e){t.subcategories=e.data}).catch(function(e){t.errors.push(e)}),X.a.get("http://localhost:8000/manufacturers/list").then(function(e){t.manufacturers=e.data}).catch(function(e){t.errors.push(e)}),-1!==this.productID&&X.a.get("http://localhost:8000/product/"+this.productID+"/get").then(function(e){t.product=e.data}).catch(function(e){t.errors.push(e)})}},ct=rt,it=(a("d861"),Object(j["a"])(ct,ot,nt,!1,null,null,null));it.options.__file="AddProduct.vue";var ut=it.exports,st=[{path:"/",component:F,children:[{path:"/",component:at},{path:"/add",name:"add",props:!0,component:ut}]}];st.push({path:"*",component:function(){return a.e("4b47640d").then(a.bind(null,"e51e"))}});var lt=st;n["a"].use(U["a"]);var pt=function(){var t=new U["a"]({scrollBehavior:function(){return{y:0}},routes:lt,mode:"hash",base:""});return t},dt=function(){var t="function"===typeof B?B():B,e="function"===typeof pt?pt({store:t}):pt;t.$router=e;var a={el:"#q-app",router:e,store:t,render:function(t){return t(D)}};return{app:a,store:t,router:e}},ft=a("a925"),ht={failed:"Action failed",success:"Action was successful"},mt={"en-us":ht},gt=function(t){var e=t.app,a=t.Vue;a.use(ft["a"]),e.i18n=new ft["a"]({locale:"en-us",fallbackLocale:"en-us",messages:mt})},bt=function(t){var e=t.Vue;e.prototype.$axios=X.a},vt=dt(),_t=vt.app,qt=vt.store,yt=vt.router;[gt,bt].forEach(function(t){t({app:_t,router:yt,store:qt,Vue:n["a"],ssrContext:null})}),new n["a"](_t)},4237:function(t,e,a){},"7a39":function(t,e){},"7e6d":function(t,e,a){},cf3c:function(t,e){},d861:function(t,e,a){"use strict";var o=a("4237"),n=a.n(o);n.a},fb1c:function(t,e,a){}},[[0,"runtime","vendor"]]]);