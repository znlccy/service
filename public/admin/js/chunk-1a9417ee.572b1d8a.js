(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1a9417ee"],{"11d9":function(t,e,n){"use strict";function a(t){return a=Object.getPrototypeOf||function(t){return t.__proto__},a(t)}n.d(e,"a",function(){return a})},"4c74":function(t,e,n){},"840c":function(t,e,n){"use strict";n.d(e,"a",function(){return s});var a=n("c665"),i=n("dc0a"),r=n("aa9a"),o=n("d328"),c=n("11d9"),u=n("4a2d"),s=function(t){function e(){return Object(a["a"])(this,e),Object(o["a"])(this,Object(c["a"])(e).apply(this,arguments))}return Object(r["a"])(e,null,[{key:"index",value:function(t,e,n){u["a"].request(this.uri()+"index",e,n,t)}},{key:"detail",value:function(t,e,n){u["a"].request(this.uri()+"detail",e,n,t)}},{key:"uri",value:function(){return u["a"].url()+"history_template/"}}]),Object(i["a"])(e,t),e}(u["a"])},a33a:function(t,e,n){"use strict";n.r(e);var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("Divider",{attrs:{orientation:"left"}},[t._v("列表数据")]),n("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.load?n("Spin",{attrs:{size:"large",fix:""}}):t._e(),t.listData.last_page>1?n("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[n("Page",{attrs:{total:t.listData.total,"page-size":t.listData.per_page,current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},i=[],r=(n("7f7f"),n("840c")),o={data:function(){var t=this;return{formData:{},load:!1,space:[],listData:{},columns:[{title:"id",align:"center",key:"id"},{title:"模板编号",align:"center",key:"template_no"},{title:"模板名称",align:"center",key:"name"},{title:"模板备注",align:"center",key:"remark"},{title:"更新时间",align:"center",key:"update_time"},{title:"Action",width:250,align:"center",render:function(e,n){return e("div",[e("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.detail(n.row.id)}}},"详情")])}}]}},activated:function(){this.loadData()},methods:{loadData:function(t){var e=this;t&&(this.formData.jump_page=t),this.load=!0,r["a"].index({template_id:this.$route.params.id},function(t){e.listData=t.data.data,e.load=!1},function(){e.load=!1})},detail:function(t){this.$router.push({name:"contract_template_history_detail",params:{id:this.$route.params.id,historyId:t}})},ref:function(){this.formData={},this.loadData(1)},del:function(t){var e=this;this.$Modal.confirm({title:"确定删除"+t.name+"吗?",okText:"删除",cancelText:"取消",loading:!0,onOk:function(){r["a"].delete({id:t.id},function(){e.$Modal.remove(),e.$Message.success("删除成功"),e.loadData()},function(){e.$Modal.remove()})}})}}},c=o,u=(n("e99a"),n("2877")),s=Object(u["a"])(c,a,i,!1,null,"30d69ff6",null);s.options.__file="index.vue";e["default"]=s.exports},d328:function(t,e,n){"use strict";var a=n("6bde");function i(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function r(t,e){return!e||"object"!==Object(a["a"])(e)&&"function"!==typeof e?i(t):e}n.d(e,"a",function(){return r})},dc0a:function(t,e,n){"use strict";function a(t,e){return a=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},a(t,e)}function i(t,e){if("function"!==typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");a(t.prototype,e&&e.prototype),e&&a(t,e)}n.d(e,"a",function(){return i})},e99a:function(t,e,n){"use strict";var a=n("4c74"),i=n.n(a);i.a}}]);
//# sourceMappingURL=chunk-1a9417ee.572b1d8a.js.map