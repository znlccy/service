(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-83df1082"],{6415:function(t,a,e){},"9e3f":function(t,a,e){"use strict";e.r(a);var i=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("Divider",{attrs:{orientation:"left"}},[t._v("列表筛选")]),e("Row",{staticClass:"search"},[e("Form",{attrs:{inline:"",model:t.formData,"label-width":80}},[e("FormItem",{attrs:{label:"模板 id"}},[e("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入模板id"},model:{value:t.formData.id,callback:function(a){t.$set(t.formData,"id",a)},expression:"formData.id"}})],1),e("FormItem",{attrs:{label:"模板名称"}},[e("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入模板名称"},model:{value:t.formData.name,callback:function(a){t.$set(t.formData,"name",a)},expression:"formData.name"}})],1),e("FormItem",{attrs:{label:"状态"}},[e("Select",{staticClass:"filter-input",model:{value:t.formData.status,callback:function(a){t.$set(t.formData,"status",a)},expression:"formData.status"}},[e("Option",{attrs:{label:"锁定",value:0}}),e("Option",{attrs:{label:"可用",value:1}})],1)],1)],1)],1),e("div",{staticClass:"filter-btn"},[e("span",{staticClass:"span"},[t._v("操作 ")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"info",icon:"ios-search"},on:{click:function(a){t.loadData(1)}}},[t._v(" 搜索")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"warning",icon:"md-refresh"},on:{click:function(a){t.ref()}}},[t._v("重置")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"success",icon:"md-add"},on:{click:function(a){t.add()}}},[t._v("新建")])],1),e("Divider",{attrs:{orientation:"left"}},[t._v("列表数据")]),e("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.load?e("Spin",{attrs:{size:"large",fix:""}}):t._e(),t.listData.last_page>1?e("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[e("Page",{attrs:{total:t.listData.total,"page-size":t.listData.per_page,current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},n=[],s=(e("7f7f"),e("fc38")),o={data:function(){var t=this;return{formData:{},load:!1,space:[],listData:{},columns:[{title:"id",align:"center",key:"id"},{title:"模板编号",align:"center",key:"template_no"},{title:"模板名称",align:"center",key:"name"},{title:"模板备注",align:"center",key:"remark"},{title:"状态",key:"status",align:"center",render:function(t,a){return t("span",0===a.row.status?"锁定":"可用")}},{title:"Action",width:250,align:"center",render:function(a,e){return a("div",[a("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.add(e.row.id)}}},"编辑"),a("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.add(e.row.id)}}},"关联合同"),a("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.history(e.row.id)}}},"历史"),a("Button",{props:{type:"error",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.del(e.row)}}},"删除")])}}]}},activated:function(){this.loadData()},methods:{loadData:function(t){var a=this;t&&(this.formData.jump_page=t),this.load=!0,s["a"].index(this.formData,function(t){a.listData=t.data.data,a.load=!1},function(){a.load=!1})},history:function(t){this.$router.push({name:"contract_template_history",params:{id:t}})},add:function(t){this.$router.push({name:"contractTemplateEdit",query:{id:t}})},ref:function(){this.formData={},this.loadData(1)},del:function(t){var a=this;this.$Modal.confirm({title:"确定删除"+t.name+"吗?",okText:"删除",cancelText:"取消",loading:!0,onOk:function(){s["a"].delete({id:t.id},function(){a.$Modal.remove(),a.$Message.success("删除成功"),a.loadData()},function(){a.$Modal.remove()})}})}}},l=o,r=(e("c24b"),e("2877")),c=Object(r["a"])(l,i,n,!1,null,"6bffb19c",null);c.options.__file="index.vue";a["default"]=c.exports},c24b:function(t,a,e){"use strict";var i=e("6415"),n=e.n(i);n.a},fc38:function(t,a,e){"use strict";e.d(a,"a",function(){return o});var i=e("c665"),n=e("aa9a"),s=e("4a2d"),o=function(){function t(){Object(i["a"])(this,t)}return Object(n["a"])(t,null,[{key:"index",value:function(t,a,e){s["a"].request(this.uri()+"index",a,e,t)}},{key:"save",value:function(t,a,e){s["a"].request(this.uri()+"save",a,e,t)}},{key:"detail",value:function(t,a,e){s["a"].request(this.uri()+"detail",a,e,t)}},{key:"delete",value:function(t,a,e){s["a"].request(this.uri()+"delete",a,e,t)}},{key:"select",value:function(t,a){s["a"].request(this.uri()+"select",t,a)}},{key:"uri",value:function(){return s["a"].url()+"contract_template/"}}]),t}()}}]);
//# sourceMappingURL=chunk-83df1082.f796f6c1.js.map