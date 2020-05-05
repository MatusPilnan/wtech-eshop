(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["0760b1ea"],{"021f":function(t,e,a){},"85f6":function(t,e,a){"use strict";a.r(e);var o=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-page",{attrs:{padding:""}},[a("h1",[t._v("Úprava produktu")]),a("form",[a("q-select",{attrs:{error:t.$v.product.subcategory_id.$error,"float-label":"Podkategória",options:t.subcategoryOptions},model:{value:t.product.subcategory_id,callback:function(e){t.$set(t.product,"subcategory_id",e)},expression:"product.subcategory_id"}}),a("q-field",{attrs:{count:255}},[a("q-input",{attrs:{error:t.$v.product.name.$error,"float-label":"Názov produktu"},model:{value:t.product.name,callback:function(e){t.$set(t.product,"name",e)},expression:"product.name"}})],1),a("q-field",{attrs:{count:255}},[a("q-input",{attrs:{error:t.$v.product.short_desc.$error,"float-label":"Krátky popis produktu"},model:{value:t.product.short_desc,callback:function(e){t.$set(t.product,"short_desc",e)},expression:"product.short_desc"}})],1),a("q-input",{attrs:{error:t.$v.product.long_desc.$error,"float-label":"Podrobný opis produktu",type:"textarea"},model:{value:t.product.long_desc,callback:function(e){t.$set(t.product,"long_desc",e)},expression:"product.long_desc"}}),a("q-input",{attrs:{error:t.$v.product.price.$error,"float-label":"Cena produktu",type:"number",decimals:2,align:"right",suffix:" EUR"},model:{value:t.product.price,callback:function(e){t.$set(t.product,"price",e)},expression:"product.price"}}),a("div",{staticClass:"row no-wrap"},[a("q-select",{staticClass:"col-11",attrs:{error:t.$v.product.manufacturer_id.$error,"float-label":"Výrobca",options:t.manufacturerOptions},model:{value:t.product.manufacturer_id,callback:function(e){t.$set(t.product,"manufacturer_id",e)},expression:"product.manufacturer_id"}}),a("q-btn",{staticClass:"col-1",attrs:{flat:"",icon:"add"},on:{click:t.newManufacturer}})],1),a("q-uploader",{ref:"upMini",attrs:{url:"http://localhost:8000/images/upload",extensions:".jpg, .jpeg, .png","float-label":"Miniatúra v košíku","additional-fields":t.addFieldsMini},on:{finish:function(e){t.loadMini()}}}),a("q-card",[a("q-card-media",{attrs:{"overlay-postition":"top"}},[a("img",{attrs:{src:"http://localhost:8000/"+t.mini.file}}),a("q-card-title",{attrs:{slot:"overlay"},slot:"overlay"},[t._v("\n          Miniatúra v košíku\n        ")])],1)],1),a("q-uploader",{ref:"upThumb",attrs:{url:"http://localhost:8000/images/upload",extensions:".jpg, .jpeg, .png","float-label":"Náhľad v katalógu","additional-fields":t.addFieldsThumb},on:{finish:function(e){t.loadThumbnail()}}}),a("q-card",[a("q-card-media",{attrs:{"overlay-postition":"top"}},[a("img",{attrs:{src:"http://localhost:8000/"+t.thumbnail.file}}),a("q-card-title",{attrs:{slot:"overlay"},slot:"overlay"},[t._v("\n          Náhľad v katalógu\n        ")])],1)],1),a("q-uploader",{ref:"upImg",attrs:{url:"http://localhost:8000/images/upload",extensions:".jpg, .jpeg, .png",multiple:"","float-label":"Obrázky","additional-fields":t.addFields},on:{finish:function(e){t.loadImages()}}}),t._l(t.images,function(e){return a("q-card",{key:e.id},[a("q-card-media",{attrs:{"overlay-position":"bottom"}},[a("img",{attrs:{src:"http://localhost:8000/"+e.file}}),a("q-btn",{attrs:{slot:"overlay",round:"",icon:"delete"},on:{click:function(a){t.deleteImg(e)}},slot:"overlay"})],1)],1)}),a("q-btn",{staticClass:"float-right q-mt-md",attrs:{label:"Uložiť",color:"primary"},on:{click:t.save}})],2)])},r=[];o._withStripped=!0;a("96cf");var n=a("c973"),i=a.n(n),u=(a("55dd"),a("7f7f"),a("ac6a"),a("bc3a")),c=a.n(u),s=a("b5ae"),l={data:function(){return{manufacturers:[],subcategories:[],product:{},mini:{},thumbnail:{},images:[]}},computed:{manufacturerOptions:function(){var t=[];return this.manufacturers.forEach(function(e){t.push({label:e.name,value:e.id})}),t.sort(function(t,e){return t.label<e.label?-1:t.label===e.label?0:t.label>e.label?1:void 0})},subcategoryOptions:function(){var t=[];return this.subcategories.forEach(function(e){t.push({label:e.name,value:e.id})}),t.sort(function(t,e){return t.label<e.label?-1:t.label===e.label?0:t.label>e.label?1:void 0})},addFieldsMini:function(){return[{name:"product_id",value:this.productID},{name:"mini",value:!0}]},addFieldsThumb:function(){return[{name:"product_id",value:this.productID},{name:"thumbnail",value:!0}]},addFields:function(){return[{name:"product_id",value:this.productID}]}},props:{productID:{default:-1}},validations:{product:{name:{required:s["required"],maxLength:Object(s["maxLength"])(255)},short_desc:{required:s["required"],maxLength:Object(s["maxLength"])(255)},long_desc:{required:s["required"]},price:{required:s["required"]},manufacturer_id:{required:s["required"]},subcategory_id:{required:s["required"]}}},methods:{uploadMini:function(){return"http://localhost:8000/images/upload/"+this.product.id},deleteImg:function(t){var e=this;c.a.delete("http://localhost:8000/images/".concat(t.id)).then(function(t){e.loadImages()}).catch()},save:function(){var t=i()(regeneratorRuntime.mark(function t(e){var a=this;return regeneratorRuntime.wrap(function(t){while(1)switch(t.prev=t.next){case 0:if(this.$v.product.$touch(),!this.$v.product.$error){t.next=4;break}return this.$q.notify({message:"Skontrolujte zadane udaje",color:"negative",timeout:1001,position:"center"}),t.abrupt("return");case 4:return t.next=6,c.a.post("http://localhost:8000/products",this.product).then(function(t){a.productID=t.data.product_id,a.$q.notify({message:"Produkt uspesne ulozeny",color:"positive",timeout:1001,position:"center"})}).catch(function(t){a.$q.notify({message:"Produkt sa nepodarilo ulozit",color:"negative",timeout:1e3,position:"center"})});case 6:this.$refs.upMini.upload(),this.$refs.upThumb.upload(),this.$refs.upImg.upload();case 9:case"end":return t.stop()}},t,this)}));return function(e){return t.apply(this,arguments)}}(),loadManufacturers:function(){var t=this;c.a.get("http://localhost:8000/manufacturers/list").then(function(e){t.manufacturers=e.data}).catch(function(e){t.errors.push(e)})},loadSubcategories:function(){var t=this;c.a.get("http://localhost:8000/subcategories/list").then(function(e){t.subcategories=e.data}).catch(function(e){t.errors.push(e)})},newManufacturer:function(){var t=this;this.$q.dialog({title:"Nový výrobca",message:"Zadajte meno nového výrobcu",prompt:{model:"",type:"text"}}).then(function(e){""!==e&&(console.log(e),c.a.post("http://localhost:8000/manufacturers/new",{name:e}).then(function(e){t.loadManufacturers()}).catch(function(t){console.log(t)}))}).catch(function(){})},loadImages:function(){var t=this;c.a.get("http://localhost:8000/images/"+this.productID).then(function(e){t.images=e.data}).catch(function(t){})},loadMini:function(){var t=this;c.a.get("http://localhost:8000/images/"+this.productID+"/mini").then(function(e){t.mini=e.data}).catch(function(t){})},loadThumbnail:function(){var t=this;c.a.get("http://localhost:8000/images/"+this.productID+"/thumbnail").then(function(e){t.thumbnail=e.data}).catch(function(t){})}},created:function(){var t=this;this.loadSubcategories(),this.loadManufacturers(),this.loadImages(),this.loadMini(),this.loadThumbnail(),-1!==this.productID&&c.a.get("http://localhost:8000/product/"+this.productID+"/get").then(function(e){t.product=e.data}).catch(function(e){t.errors.push(e)})}},d=l,p=(a("8a8c"),a("2877")),h=Object(p["a"])(d,o,r,!1,null,null,null);h.options.__file="Edit.vue";e["default"]=h.exports},"8a8c":function(t,e,a){"use strict";var o=a("021f"),r=a.n(o);r.a}}]);