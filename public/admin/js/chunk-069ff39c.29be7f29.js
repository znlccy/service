(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-069ff39c"],{"11d9":function(t,e,a){"use strict";function n(t){return n=Object.getPrototypeOf||function(t){return t.__proto__},n(t)}a.d(e,"a",function(){return n})},2649:function(t,e,a){"use strict";a.d(e,"a",function(){return u});var n=a("c665"),i=a("dc0a"),o=a("aa9a"),r=a("d328"),s=a("11d9"),c=a("4a2d"),u=function(t){function e(){return Object(n["a"])(this,e),Object(r["a"])(this,Object(s["a"])(e).apply(this,arguments))}return Object(o["a"])(e,null,[{key:"index",value:function(t,e,a){c["a"].request(this.uri()+"index",e,a,t)}},{key:"save",value:function(t,e,a){c["a"].request(this.uri()+"save",e,a,t)}},{key:"detail",value:function(t,e,a){c["a"].request(this.uri()+"detail",e,a,t)}},{key:"delete",value:function(t,e,a){c["a"].request(this.uri()+"delete",e,a,t)}},{key:"select",value:function(t,e){c["a"].request(this.uri()+"select",t,e)}},{key:"uri",value:function(){return c["a"].url()+"equipment_type/"}}]),Object(i["a"])(e,t),e}(c["a"])},"68a3":function(t,e,a){"use strict";var n=a("c758"),i=a.n(n);i.a},c1c4:function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("Divider",{attrs:{orientation:"left"}},[t._v("列表筛选")]),a("Row",{staticClass:"search"},[a("Form",{attrs:{inline:"",model:t.formData,"label-width":80}},[a("FormItem",{attrs:{label:"设备 id"}},[a("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入设备id"},model:{value:t.formData.id,callback:function(e){t.$set(t.formData,"id",e)},expression:"formData.id"}})],1),a("FormItem",{attrs:{label:"设备名称"}},[a("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入设备名称"},model:{value:t.formData.name,callback:function(e){t.$set(t.formData,"name",e)},expression:"formData.name"}})],1)],1)],1),a("div",{staticClass:"filter-btn"},[a("span",{staticClass:"span"},[t._v("操作 ")]),a("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"info",icon:"ios-search"},on:{click:function(e){t.loadData(1)}}},[t._v(" 搜索")]),a("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"warning",icon:"md-refresh"},on:{click:function(e){t.ref()}}},[t._v("重置")]),a("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"success",icon:"md-add"},on:{click:function(e){t.add()}}},[t._v("新建")])],1),a("Divider",{attrs:{orientation:"left"}},[t._v("列表数据")]),a("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.load?a("Spin",{attrs:{size:"large",fix:""}}):t._e(),t.listData.last_page>1?a("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[a("Page",{attrs:{total:t.listData.total,"page-size":t.listData.per_page,current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},i=[],o=(a("7f7f"),a("2649")),r={data:function(){var t=this;return{formData:{},load:!1,listData:{},columns:[{title:"id",align:"center",key:"id"},{title:"创建时间",align:"center",key:"create_time"},{title:"设备名称",align:"center",key:"name"},{title:"Action",width:200,align:"center",render:function(e,a){return e("div",[e("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.add(a.row.id)}}},"编辑"),e("Button",{props:{type:"error",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.del(a.row)}}},"删除")])}}]}},activated:function(){this.loadData()},methods:{loadData:function(t){var e=this;t&&(this.formData.jump_page=t),this.formData.type=this.type,this.load=!0,o["a"].index(this.formData,function(t){e.listData=t.data.data,e.load=!1},function(){e.load=!1})},add:function(t){this.$router.push({name:"equipmentTypeEdit",query:{id:t}})},ref:function(){this.formData={},this.loadData(1)},del:function(t){var e=this;this.$Modal.confirm({title:"确定删除"+t.name+"吗?",okText:"删除",cancelText:"取消",loading:!0,onOk:function(){o["a"].delete({id:t.id},function(){e.$Modal.remove(),e.$Message.success("删除成功"),e.loadData()},function(){e.$Modal.remove()})}})}}},s=r,c=(a("68a3"),a("2877")),u=Object(c["a"])(s,n,i,!1,null,"8d0b115a",null);u.options.__file="index.vue";e["default"]=u.exports},c758:function(t,e,a){},d328:function(t,e,a){"use strict";var n=a("6bde");function i(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function o(t,e){return!e||"object"!==Object(n["a"])(e)&&"function"!==typeof e?i(t):e}a.d(e,"a",function(){return o})},dc0a:function(t,e,a){"use strict";function n(t,e){return n=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},n(t,e)}function i(t,e){if("function"!==typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");n(t.prototype,e&&e.prototype),e&&n(t,e)}a.d(e,"a",function(){return i})}}]);
//# sourceMappingURL=chunk-069ff39c.29be7f29.js.map