(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-36834dee"],{"3ee0":function(t,a,e){},"7b44":function(t,a,e){"use strict";e.r(a);var n=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("Divider",{attrs:{orientation:"left"}},[t._v("列表筛选")]),e("Row",{staticClass:"search"},[e("Form",{attrs:{inline:"",model:t.formData,"label-width":100}},[e("FormItem",{attrs:{label:"合同模板编号"}},[e("Input",{staticClass:"filter-input",attrs:{placeholder:"请输入合同模板编号"},model:{value:t.formData.contract_no,callback:function(a){t.$set(t.formData,"contract_no",a)},expression:"formData.contract_no"}})],1)],1)],1),e("div",{staticClass:"filter-btn"},[e("span",{staticClass:"span"},[t._v("操作 ")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"info",icon:"ios-search"},on:{click:function(a){t.loadData(1)}}},[t._v(" 搜索")]),e("Button",{staticStyle:{"font-weight":"bold"},attrs:{type:"warning",icon:"md-refresh"},on:{click:function(a){t.ref()}}},[t._v("重置")])],1),e("Divider",{attrs:{orientation:"left"}},[t._v("列表数据")]),e("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.load?e("Spin",{attrs:{size:"large",fix:""}}):t._e(),t.listData.last_page>1?e("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[e("Page",{attrs:{total:t.listData.total,"page-size":t.listData.per_page,current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},i=[],o=(e("7f7f"),e("bc7a")),l={data:function(){return{formData:{},load:!1,space:[],listData:{},columns:[{title:"合同模板",align:"center",key:"template_no"},{title:"合同总数",align:"center",key:"contract_sum"},{title:"生效中的",align:"center",key:"effect_sum"},{title:"即将过期的",align:"center",key:"expiry_sum"},{title:"待审核的",align:"center",key:"check_sum"}]}},activated:function(){this.loadData()},methods:{loadData:function(t){var a=this;t&&(this.formData.jump_page=t),this.load=!0,o["a"].collect(this.formData,function(t){a.listData=t.data.data,a.load=!1},function(){a.load=!1})},ref:function(){this.formData={},this.loadData(1)},del:function(t){var a=this;this.$Modal.confirm({title:"确定删除"+t.name+"吗?",okText:"删除",cancelText:"取消",loading:!0,onOk:function(){o["a"].delete({id:t.id},function(){a.$Modal.remove(),a.$Message.success("删除成功"),a.loadData()},function(){a.$Modal.remove()})}})}}},c=l,s=(e("9976"),e("2877")),r=Object(s["a"])(c,n,i,!1,null,"4f14d516",null);r.options.__file="collect.vue";a["default"]=r.exports},9976:function(t,a,e){"use strict";var n=e("3ee0"),i=e.n(n);i.a},bc7a:function(t,a,e){"use strict";e.d(a,"a",function(){return l});var n=e("c665"),i=e("aa9a"),o=e("4a2d"),l=function(){function t(){Object(n["a"])(this,t)}return Object(i["a"])(t,null,[{key:"index",value:function(t,a,e){o["a"].request(this.uri()+"index",a,e,t)}},{key:"detail",value:function(t,a,e){o["a"].request(this.uri()+"detail",a,e,t)}},{key:"download",value:function(t,a,e){o["a"].request(this.uri()+"download",a,e,t)}},{key:"collect",value:function(t,a,e){o["a"].request(this.uri()+"collect",a,e,t)}},{key:"signing",value:function(t,a,e){o["a"].request(this.uri()+"signing",a,e,t)}},{key:"uri",value:function(){return o["a"].url()+"contract/"}}]),t}()}}]);
//# sourceMappingURL=chunk-36834dee.11c713c8.js.map