(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-38c32d80"],{"1fc7":function(t,a,e){"use strict";e.r(a);var n=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("Divider",{attrs:{orientation:"left"}},[t._v("列表筛选")]),e("Row",{staticClass:"search"},[e("Form",{attrs:{inline:"",model:t.formData,"label-width":80}},[e("FormItem",{attrs:{label:"场馆 id"}},[e("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入场馆id"},model:{value:t.formData.id,callback:function(a){t.$set(t.formData,"id",a)},expression:"formData.id"}})],1),e("FormItem",{attrs:{label:"场馆名称"}},[e("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入场馆名称"},model:{value:t.formData.name,callback:function(a){t.$set(t.formData,"name",a)},expression:"formData.name"}})],1),e("FormItem",{attrs:{label:"场馆编号"}},[e("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入场馆编号"},model:{value:t.formData.venue_no,callback:function(a){t.$set(t.formData,"venue_no",a)},expression:"formData.venue_no"}})],1)],1)],1),e("div",{staticClass:"filter-btn"},[e("span",{staticClass:"span"},[t._v("操作 ")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"info",icon:"ios-search"},on:{click:function(a){t.loadData(1)}}},[t._v(" 搜索")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"warning",icon:"md-refresh"},on:{click:function(a){t.ref()}}},[t._v("重置")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"success",icon:"md-add"},on:{click:function(a){t.add()}}},[t._v("新建")])],1),e("Divider",{attrs:{orientation:"left"}},[t._v("列表数据")]),e("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.load?e("Spin",{attrs:{size:"large",fix:""}}):t._e(),t.listData.last_page>1?e("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[e("Page",{attrs:{total:t.listData.total,"page-size":t.listData.per_page,current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},i=[],o=(e("7f7f"),e("cadf"),e("551c"),e("097d"),e("b37f")),r={data:function(){var t=this;return{formData:{},load:!1,listData:{},columns:[{title:"id",align:"center",key:"id"},{title:"场馆编号",align:"center",key:"venue_no"},{title:"场馆名称",align:"center",key:"name"},{title:"所属空间",align:"center",render:function(t,a){return t("span",a.row.space.name)}},{title:"容纳人数",align:"center",key:"accommodate_num"},{title:"状态",key:"status",align:"center",render:function(t,a){return t("span",0===a.row.status?"锁定":"可用")}},{title:"Action",width:200,align:"center",render:function(a,e){return a("div",[a("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.add(e.row.id)}}},"编辑"),a("Button",{props:{type:"error",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.del(e.row)}}},"删除")])}}]}},activated:function(){this.loadData()},methods:{loadData:function(t){var a=this;t&&(this.formData.jump_page=t),this.formData.type=this.type,this.load=!0,o["a"].index(this.formData,function(t){a.listData=t.data.data,a.load=!1},function(){a.load=!1})},add:function(t){this.$router.push({name:"venueEdit",query:{id:t}})},ref:function(){this.formData={},this.loadData(1)},del:function(t){var a=this;this.$Modal.confirm({title:"确定删除"+t.name+"吗?",okText:"删除",cancelText:"取消",loading:!0,onOk:function(){o["a"].delete({id:t.id},function(){a.$Modal.remove(),a.$Message.success("删除成功"),a.loadData()},function(){a.$Modal.remove()})}})}}},s=r,l=(e("e3a6"),e("2877")),c=Object(l["a"])(s,n,i,!1,null,"16726fda",null);c.options.__file="index.vue";a["default"]=c.exports},5844:function(t,a,e){},b37f:function(t,a,e){"use strict";e.d(a,"a",function(){return r});var n=e("c665"),i=e("aa9a"),o=e("4a2d"),r=function(){function t(){Object(n["a"])(this,t)}return Object(i["a"])(t,null,[{key:"index",value:function(t,a,e){o["a"].request(this.uri()+"index",a,e,t)}},{key:"save",value:function(t,a,e){o["a"].request(this.uri()+"save",a,e,t)}},{key:"detail",value:function(t,a,e){o["a"].request(this.uri()+"detail",a,e,t)}},{key:"delete",value:function(t,a,e){o["a"].request(this.uri()+"delete",a,e,t)}},{key:"uri",value:function(){return o["a"].url()+"venue/"}}]),t}()},e3a6:function(t,a,e){"use strict";var n=e("5844"),i=e.n(n);i.a}}]);
//# sourceMappingURL=chunk-38c32d80.1e1bd900.js.map