(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-e1672984"],{4022:function(t,a,e){"use strict";e.r(a);var i=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("Divider",{attrs:{orientation:"left"}},[t._v("列表筛选")]),e("Row",{staticClass:"search"},[e("Form",{attrs:{inline:"",model:t.formData,"label-width":80}},[e("FormItem",{attrs:{label:"资源商名称"}},[e("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入资源商名称"},model:{value:t.formData.name,callback:function(a){t.$set(t.formData,"name",a)},expression:"formData.name"}})],1),e("FormItem",{attrs:{label:"状态"}},[e("RadioGroup",{model:{value:t.formData.status,callback:function(a){t.$set(t.formData,"status",a)},expression:"formData.status"}},[e("Radio",{attrs:{label:0}},[e("span",[t._v("不可用")])]),e("Radio",{attrs:{label:1}},[e("span",[t._v("可用")])])],1)],1)],1)],1),e("div",{staticClass:"filter-btn"},[e("span",{staticClass:"span"},[t._v("操作 ")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"info",icon:"ios-search"},on:{click:function(a){t.loadData(1)}}},[t._v(" 搜索")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"warning",icon:"md-refresh"},on:{click:function(a){t.ref()}}},[t._v("重置")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"success",icon:"md-add"},on:{click:function(a){t.add()}}},[t._v("新建")])],1),e("Divider",{attrs:{orientation:"left"}},[t._v("列表数据")]),e("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.load?e("Spin",{attrs:{size:"large",fix:""}}):t._e(),t.listData.last_page>1?e("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[e("Page",{attrs:{total:t.listData.total,"page-size":t.listData.per_page,current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},n=[],s=(e("7f7f"),e("5714")),o={data:function(){var t=this;return{formData:{},load:!1,listData:{},columns:[{title:"id",align:"center",key:"id"},{title:"名称",align:"center",key:"name"},{title:"价格",align:"center",key:"price"},{title:"分组",align:"center",key:"group_name"},{title:"创建时间",align:"center",key:"create_time"},{title:"状态",key:"status",align:"center",render:function(t,a){return t("span",0===a.row.status?"不可用":"可用")}},{title:"Action",width:200,align:"center",render:function(a,e){return a("div",[a("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.add(e.row.id)}}},"编辑"),a("Button",{props:{type:"error",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.del(e.row)}}},"删除")])}}]}},activated:function(){this.loadData()},methods:{loadData:function(t){var a=this;t&&(this.formData.jump_page=t),this.formData.type=this.type,this.load=!0,s["a"].index(this.formData,function(t){a.listData=t.data.data,a.load=!1},function(){a.load=!1})},add:function(t){this.$router.push({name:"serviceEdit",query:{id:t}})},ref:function(){this.formData={},this.loadData(1)},del:function(t){var a=this;this.$Modal.confirm({title:"确定删除 "+t.name+" 吗?",okText:"删除",cancelText:"取消",loading:!0,onOk:function(){s["a"].delete({id:t.id},function(){a.$Modal.remove(),a.$Message.success("删除成功"),a.loadData()},function(){a.$Modal.remove()})}})}}},r=o,l=(e("c3ba"),e("2877")),c=Object(l["a"])(r,i,n,!1,null,"cde2833e",null);c.options.__file="index.vue";a["default"]=c.exports},5714:function(t,a,e){"use strict";e.d(a,"a",function(){return o});var i=e("c665"),n=e("aa9a"),s=e("4a2d"),o=function(){function t(){Object(i["a"])(this,t)}return Object(n["a"])(t,null,[{key:"index",value:function(t,a,e){s["a"].request(this.uri()+"index",a,e,t)}},{key:"save",value:function(t,a,e){s["a"].request(this.uri()+"save",a,e,t)}},{key:"detail",value:function(t,a,e){s["a"].request(this.uri()+"detail",a,e,t)}},{key:"delete",value:function(t,a,e){s["a"].request(this.uri()+"delete",a,e,t)}},{key:"spinner",value:function(t,a){s["a"].request(this.uri()+"spinner",t,a)}},{key:"uri",value:function(){return s["a"].url()+"service/"}}]),t}()},a96a:function(t,a,e){},c3ba:function(t,a,e){"use strict";var i=e("a96a"),n=e.n(i);n.a}}]);
//# sourceMappingURL=chunk-e1672984.490fd097.js.map