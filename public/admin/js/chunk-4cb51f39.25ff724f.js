(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4cb51f39"],{"11d9":function(t,a,e){"use strict";function s(t){return s=Object.getPrototypeOf||function(t){return t.__proto__},s(t)}e.d(a,"a",function(){return s})},"1b81":function(t,a,e){"use strict";var s=e("2885"),r=e.n(s);r.a},2885:function(t,a,e){},"9aad":function(t,a,e){"use strict";e.d(a,"a",function(){return l});var s=e("c665"),r=e("dc0a"),n=e("aa9a"),o=e("d328"),i=e("11d9"),c=e("4a2d"),l=function(t){function a(){return Object(s["a"])(this,a),Object(o["a"])(this,Object(i["a"])(a).apply(this,arguments))}return Object(n["a"])(a,null,[{key:"index",value:function(t,a,e){c["a"].request(this.uri()+"index",a,e,t)}},{key:"save",value:function(t,a,e){c["a"].request(this.uri()+"save",a,e,t)}},{key:"detail",value:function(t,a,e){c["a"].request(this.uri()+"detail",a,e,t)}},{key:"progress",value:function(t,a,e){c["a"].request(this.uri()+"progress",a,e,t)}},{key:"copy",value:function(t,a){c["a"].request(this.uri()+"copy",t,a)}},{key:"delete",value:function(t,a,e){c["a"].request(this.uri()+"delete",a,e,t)}},{key:"uri",value:function(){return c["a"].url()+"order/"}}]),Object(r["a"])(a,t),a}(c["a"])},"9dd3":function(t,a,e){"use strict";e.r(a);var s=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("Divider",{attrs:{orientation:"left"}},[t._v("订单详情")]),e("Card",[e("H2",[t._v("订单号:"+t._s(this.data.order_no)+"\n      "),e("Button",{staticStyle:{"margin-left":"20px"},attrs:{type:"info",icon:"md-create"}},[t._v("编辑")])],1),e("Row",[e("Col",{staticClass:"order-item",attrs:{span:16}},[e("Row",[e("Col",{attrs:{span:12}},[e("span",{staticClass:"order-label"},[t._v("创建人: "),this.data.operator?e("span",{staticClass:"order-value"},[t._v(t._s(this.data.operator.nickname))]):t._e()]),e("span",{staticClass:"order-label"},[t._v("创建时间: "),e("span",{staticClass:"order-value"},[t._v(t._s(this.data.create_time))])])]),e("Col",{attrs:{span:12}},[e("span",{staticClass:"order-label"},[t._v("关联合同:"),e("a",{staticClass:"order-value"},[t._v(t._s(this.data.contract_template_no))])]),e("span",{staticClass:"order-label"},[t._v("更新时间: "),e("span",{staticClass:"order-value"},[t._v(t._s(this.data.update_time))])])])],1)],1)],1)],1),e("Divider",{attrs:{orientation:"left"}},[t._v("订单信息")]),e("Card",[e("span",{staticClass:"order-label"},[t._v("团队名称: "),this.data.team?e("span",{staticClass:"order-value"},[t._v(t._s(this.data.team.company))]):t._e()]),e("H4",{staticStyle:{"line-height":"2rem"}},[t._v("收款计划")]),e("div",[e("Row",[e("Card",{staticStyle:{height:"50px"}},[e("Col",{attrs:{span:4}},[t._v("空间")]),e("Col",{attrs:{span:8}},[t._v("工位")]),e("Col",{attrs:{span:4}},[t._v("单价")]),e("Col",{attrs:{span:4}},[t._v("数量")]),e("Col",{attrs:{span:4}},[t._v("总价")])],1)],1),t._l(t.data.space_workplace,function(a,s){return e("Row",{key:s,staticClass:"space-item"},[e("Col",{attrs:{span:4}},[t._v(t._s(a.space.name))]),e("Col",{attrs:{span:8}},[t._v(t._s(a.space.workplace.workplace_no))]),e("Col",{attrs:{span:4}},[t._v("￥"+t._s(a.space.workplace.price))]),e("Col",{attrs:{span:4}},[t._v(t._s(a.space.workplace.area?a.space.workplace.area+"㎡":"1(个)"))]),e("Col",{attrs:{span:4}},[t._v("\n          +￥"+t._s(a.space.workplace.area?parseFloat(a.space.workplace.area)*parseFloat(a.space.workplace.price):a.space.workplace.price)+"\n        ")])],1)}),e("Row",{staticClass:"space-item"},[e("Col",{attrs:{span:20}},[t._v("优惠")]),e("Col",{attrs:{span:4}},[t._v(t._s("-￥"+t.data.discount))])],1),e("Row",{staticClass:"space-item"},[e("Col",{attrs:{span:20}},[t._v("合计")]),e("Col",{staticStyle:{"font-weight":"bold"},attrs:{span:4}},[t._v(t._s("￥"+t.data.total_price))])],1),e("Row",{staticClass:"space-item"},[e("Col",{attrs:{span:20}},[t._v("定金")]),e("Col",{attrs:{span:4}},[t._v(t._s("￥"+t.data.deposit))])],1)],2)],1)],1)},r=[],n=e("9aad"),o={data:function(){return{loading:!1,data:{}}},mounted:function(){this.loadData(),this.loadProgress()},methods:{loadData:function(){var t=this;this.loading=!0,n["a"].detail({id:this.$route.params.id},function(a){t.data=a.data.data.order},function(){})},loadProgress:function(){n["a"].progress({id:this.$route.params.id},function(t){})}}},i=o,c=(e("1b81"),e("2877")),l=Object(c["a"])(i,s,r,!1,null,"fcc965e8",null);l.options.__file="detail.vue";a["default"]=l.exports},d328:function(t,a,e){"use strict";var s=e("6bde");function r(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function n(t,a){return!a||"object"!==Object(s["a"])(a)&&"function"!==typeof a?r(t):a}e.d(a,"a",function(){return n})},dc0a:function(t,a,e){"use strict";function s(t,a){return s=Object.setPrototypeOf||function(t,a){return t.__proto__=a,t},s(t,a)}function r(t,a){if("function"!==typeof a&&null!==a)throw new TypeError("Super expression must either be null or a function");s(t.prototype,a&&a.prototype),a&&s(t,a)}e.d(a,"a",function(){return r})}}]);
//# sourceMappingURL=chunk-4cb51f39.25ff724f.js.map