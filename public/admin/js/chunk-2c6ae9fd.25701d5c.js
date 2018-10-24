(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2c6ae9fd"],{1787:function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("Tabs",{model:{value:t.type,callback:function(e){t.type=e},expression:"type"}},[a("TabPane",{attrs:{label:"按工位租凭",name:"0"}}),a("TabPane",{attrs:{label:"按面积租凭",name:"1"}})],1),a("Divider",{attrs:{orientation:"left"}},[t._v("列表筛选")]),a("Row",{staticClass:"search"},[a("Form",{attrs:{inline:"",model:t.formData,"label-width":80}},[a("FormItem",{attrs:{label:"工位ID"}},[a("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入工位id"},model:{value:t.formData.id,callback:function(e){t.$set(t.formData,"id",e)},expression:"formData.id"}})],1),a("FormItem",{attrs:{label:"工位编号"}},[a("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入工位编号"},model:{value:t.formData.workplace_no,callback:function(e){t.$set(t.formData,"workplace_no",e)},expression:"formData.workplace_no"}})],1)],1)],1),a("div",{staticClass:"filter-btn"},[a("span",{staticClass:"span"},[t._v("操作 ")]),a("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"info",icon:"ios-search"},on:{click:function(e){t.loadData(1)}}},[t._v(" 搜索")]),a("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"warning",icon:"md-refresh"},on:{click:function(e){t.ref()}}},[t._v("重置")]),a("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"success",icon:"md-add"},on:{click:function(e){t.add()}}},[t._v("新建")])],1),a("Divider",{attrs:{orientation:"left"}},[t._v("列表数据")]),a("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.load?a("Spin",{attrs:{size:"large",fix:""}}):t._e(),t.listData.last_page>1?a("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[a("Page",{attrs:{total:t.listData.total,"page-size":t.listData.per_page,current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},i=[],r=(a("7f7f"),a("4fa7")),o={data:function(){var t=this;return{type:"0",formData:{},load:!1,listData:{},columns:[{title:"id",align:"center",key:"id"},{title:"工位编号",align:"center",key:"workplace_no"},{title:"分组",align:"center",render:function(t,e){return t("span",e.row.workplace_group?e.row.workplace_group.name:"")}},{title:"所属空间",align:"center",render:function(t,e){return t("span",e.row.space.name+"-"+e.row.space.address)}},{title:"租赁单价",align:"center",render:function(e,a){return e("div",[e("span","￥"+a.row.price),e("span","0"===t.type?"/个":"/㎡")])}},{title:"租赁团队",align:"center",render:function(t,e){return t("span",e.row.enter_team?e.row.enter_team.company:"-")}},{title:"状态",key:"status",align:"center",render:function(t,e){return t("span",0===e.row.status?"未出租":"已出租")}},{title:"到期时间",key:"deadline",align:"center"},{title:"Action",width:200,align:"center",render:function(e,a){return e("div",[e("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.add(a.row.id)}}},"编辑"),e("Button",{props:{type:"error",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.del(a.row)}}},"删除")])}}]}},activated:function(){this.loadData()},methods:{loadData:function(t){var e=this;t&&(this.formData.jump_page=t),this.formData.type=this.type,this.load=!0,r["a"].index(this.formData,function(t){e.listData=t.data.data,e.load=!1},function(){e.load=!1})},add:function(t){this.$router.push({name:"workplaceEdit",query:{id:t}})},ref:function(){this.formData={},this.loadData(1)},del:function(t){var e=this;this.$Modal.confirm({title:"确定删除"+t.workplace_no+"吗?",okText:"删除",cancelText:"取消",loading:!0,onOk:function(){r["a"].delete({id:t.id},function(){e.$Modal.remove(),e.$Message.success("删除成功"),e.loadData()},function(){e.$Modal.remove()})}})}},watch:{type:function(){this.loadData(1)}}},l=o,s=(a("cd4a"),a("2877")),c=Object(s["a"])(l,n,i,!1,null,"2229b4bc",null);c.options.__file="index.vue";e["default"]=c.exports},"4fa7":function(t,e,a){"use strict";a.d(e,"a",function(){return o});var n=a("c665"),i=a("aa9a"),r=a("4a2d"),o=function(){function t(){Object(n["a"])(this,t)}return Object(i["a"])(t,null,[{key:"index",value:function(t,e,a){r["a"].request(this.uri()+"index",e,a,t)}},{key:"save",value:function(t,e,a){r["a"].request(this.uri()+"save",e,a,t)}},{key:"detail",value:function(t,e,a){r["a"].request(this.uri()+"detail",e,a,t)}},{key:"delete",value:function(t,e,a){r["a"].request(this.uri()+"delete",e,a,t)}},{key:"select",value:function(t,e,a){r["a"].request(this.uri()+"select",e,a,t)}},{key:"uri",value:function(){return r["a"].url()+"workplace/"}}]),t}()},ac4e:function(t,e,a){},cd4a:function(t,e,a){"use strict";var n=a("ac4e"),i=a.n(n);i.a}}]);
//# sourceMappingURL=chunk-2c6ae9fd.25701d5c.js.map