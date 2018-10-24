(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-748e11b9"],{"11d9":function(t,e,a){"use strict";function r(t){return r=Object.getPrototypeOf||function(t){return t.__proto__},r(t)}a.d(e,"a",function(){return r})},"23ce":function(t,e,a){},"4fa7":function(t,e,a){"use strict";a.d(e,"a",function(){return i});var r=a("c665"),n=a("aa9a"),o=a("4a2d"),i=function(){function t(){Object(r["a"])(this,t)}return Object(n["a"])(t,null,[{key:"index",value:function(t,e,a){o["a"].request(this.uri()+"index",e,a,t)}},{key:"save",value:function(t,e,a){o["a"].request(this.uri()+"save",e,a,t)}},{key:"detail",value:function(t,e,a){o["a"].request(this.uri()+"detail",e,a,t)}},{key:"delete",value:function(t,e,a){o["a"].request(this.uri()+"delete",e,a,t)}},{key:"select",value:function(t,e,a){o["a"].request(this.uri()+"select",e,a,t)}},{key:"uri",value:function(){return o["a"].url()+"workplace/"}}]),t}()},"6cb3":function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("h3",[t._v("工位信息编辑")]),a("Divider",{attrs:{orientation:"left"}},[t._v("信息填写")]),a("Row",[a("Col",{attrs:{xs:24,sm:24,md:12,lg:12}},[a("Form",{attrs:{model:t.formData,"label-width":80}},[a("FormItem",{attrs:{label:"工位编号"}},[a("Input",{attrs:{placeholder:"请填写工位编号"},model:{value:t.formData.workplace_no,callback:function(e){t.$set(t.formData,"workplace_no",e)},expression:"formData.workplace_no"}})],1),a("FormItem",{attrs:{label:"工位类型"}},[a("Select",{model:{value:t.formData.type,callback:function(e){t.$set(t.formData,"type",e)},expression:"formData.type"}},[a("Option",{attrs:{label:"按工位租赁",value:0}}),a("Option",{attrs:{label:"按面积租赁",value:1}})],1)],1),a("FormItem",{directives:[{name:"show",rawName:"v-show",value:1===t.formData.type,expression:"formData.type===1"}],attrs:{label:"总面积"}},[a("InputNumber",{staticStyle:{width:"100%"},model:{value:t.formData.total_area,callback:function(e){t.$set(t.formData,"total_area",e)},expression:"formData.total_area"}})],1),a("FormItem",{attrs:{label:"所属空间"}},[a("Select",{model:{value:t.formData.space_id,callback:function(e){t.$set(t.formData,"space_id",e)},expression:"formData.space_id"}},t._l(t.space,function(t,e){return a("Option",{key:e,attrs:{label:t.name,value:t.id}})}))],1),a("FormItem",{attrs:{label:"工位分组"}},[a("Select",{model:{value:t.formData.group_id,callback:function(e){t.$set(t.formData,"group_id",e)},expression:"formData.group_id"}},t._l(t.groups,function(t,e){return a("Option",{key:e,attrs:{label:t.name,value:t.id}})}))],1),a("FormItem",{attrs:{label:"价格"}},[a("InputNumber",{staticStyle:{width:"100%"},model:{value:t.formData.price,callback:function(e){t.$set(t.formData,"price",e)},expression:"formData.price"}})],1),a("FormItem",{attrs:{label:"状态"}},[a("Select",{model:{value:t.formData.status,callback:function(e){t.$set(t.formData,"status",e)},expression:"formData.status"}},[a("Option",{attrs:{label:"未出租",value:0}}),a("Option",{attrs:{label:"已出租",value:1}})],1)],1),a("FormItem",{attrs:{label:"到期时间"}},[a("DatePicker",{staticStyle:{width:"100%"},attrs:{type:"date",placeholder:"选择时间"},model:{value:t.formData.deadline,callback:function(e){t.$set(t.formData,"deadline",e)},expression:"formData.deadline"}})],1),a("FormItem",[a("Button",{attrs:{type:"success",long:""},on:{click:t.submit}},[t._v("提交")])],1)],1),t.load?a("Spin",{attrs:{size:"large",fix:""}}):t._e()],1)],1)],1)},n=[],o=a("4fa7"),i=a("c44c"),u=a("8443"),l={name:"edit",data:function(){return{formData:{price:0,total_area:0},groups:[],space:[],load:!1}},mounted:function(){null!=this.$route.query.id&&this.loadData(),this.loadGroup(),this.loadSpace()},methods:{loadGroup:function(){var t=this;i["a"].select(function(e){t.groups=e.data.data})},loadSpace:function(){var t=this;u["a"].select(function(e){t.space=e.data.data})},loadData:function(){var t=this;this.load=!0,o["a"].detail({id:this.$route.query.id},function(e){t.load=!1,t.formData=e.data.data.workplace,t.formData.price=parseFloat(t.formData.price),t.formData.total_area&&(t.formData.total_area=parseFloat(t.formData.total_area))},function(){t.load=!1})},submit:function(){var t=this;this.load=!0,o["a"].save(this.formData,function(e){t.load=!1,t.$router.push({name:"workplace"})},function(){t.load=!1})}}},s=l,c=(a("7f54"),a("2877")),f=Object(c["a"])(s,r,n,!1,null,"0041ddea",null);f.options.__file="edit.vue";e["default"]=f.exports},"7f54":function(t,e,a){"use strict";var r=a("23ce"),n=a.n(r);n.a},8443:function(t,e,a){"use strict";a.d(e,"a",function(){return i});var r=a("c665"),n=a("aa9a"),o=a("4a2d"),i=function(){function t(){Object(r["a"])(this,t)}return Object(n["a"])(t,null,[{key:"index",value:function(t,e,a){o["a"].request(this.uri()+"index",e,a,t)}},{key:"save",value:function(t,e,a){o["a"].request(this.uri()+"save",e,a,t)}},{key:"detail",value:function(t,e,a){o["a"].request(this.uri()+"detail",e,a,t)}},{key:"delete",value:function(t,e,a){o["a"].request(this.uri()+"delete",e,a,t)}},{key:"select",value:function(t,e){o["a"].request(this.uri()+"select",t,e)}},{key:"uri",value:function(){return o["a"].url()+"space/"}}]),t}()},c44c:function(t,e,a){"use strict";a.d(e,"a",function(){return s});var r=a("c665"),n=a("dc0a"),o=a("aa9a"),i=a("d328"),u=a("11d9"),l=a("4a2d"),s=function(t){function e(){return Object(r["a"])(this,e),Object(i["a"])(this,Object(u["a"])(e).apply(this,arguments))}return Object(o["a"])(e,null,[{key:"index",value:function(t,e,a){l["a"].request(this.uri()+"index",e,a,t)}},{key:"save",value:function(t,e,a){l["a"].request(this.uri()+"save",e,a,t)}},{key:"detail",value:function(t,e,a){l["a"].request(this.uri()+"detail",e,a,t)}},{key:"delete",value:function(t,e,a){l["a"].request(this.uri()+"delete",e,a,t)}},{key:"select",value:function(t,e){l["a"].request(this.uri()+"select",t,e)}},{key:"uri",value:function(){return l["a"].url()+"workplace_group/"}}]),Object(n["a"])(e,t),e}(l["a"])},d328:function(t,e,a){"use strict";var r=a("6bde");function n(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function o(t,e){return!e||"object"!==Object(r["a"])(e)&&"function"!==typeof e?n(t):e}a.d(e,"a",function(){return o})},dc0a:function(t,e,a){"use strict";function r(t,e){return r=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},r(t,e)}function n(t,e){if("function"!==typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");r(t.prototype,e&&e.prototype),e&&r(t,e)}a.d(e,"a",function(){return n})}}]);
//# sourceMappingURL=chunk-748e11b9.c8697bcc.js.map