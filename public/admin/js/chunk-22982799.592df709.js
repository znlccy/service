(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-22982799"],{"81a2":function(t,a,e){"use strict";var s=e("e9d8"),i=e.n(s);i.a},"928d":function(t,a,e){"use strict";e.d(a,"a",function(){return u});var s=e("c665"),i=e("aa9a"),n=e("4a2d"),u=function(){function t(){Object(s["a"])(this,t)}return Object(i["a"])(t,null,[{key:"index",value:function(t,a,e){n["a"].request(this.uri()+"index",a,e,t)}},{key:"save",value:function(t,a,e){n["a"].request(this.uri()+"save",a,e,t)}},{key:"detail",value:function(t,a,e){n["a"].request(this.uri()+"detail",a,e,t)}},{key:"delete",value:function(t,a,e){n["a"].request(this.uri()+"delete",a,e,t)}},{key:"statics",value:function(t,a,e){n["a"].request(this.uri()+"statics",a,e,t)}},{key:"uri",value:function(){return n["a"].url()+"investigate/"}}]),t}()},b657:function(t,a,e){"use strict";e.r(a);var s=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("Card",[e("h2",[t._v("问卷调查：这是一个标题")]),e("Row",{staticStyle:{margin:"20px"}},[e("Col",{attrs:{span:12}},[e("span",{staticClass:"label"},[t._v("创建人: "),e("span",{staticClass:"value"},[t._v(t._s(this.data.publisher))])]),e("span",{staticClass:"label"},[t._v("创建时间: "),e("span",{staticClass:"value"},[t._v(t._s(this.data.create_time))])])]),e("Col",{staticStyle:{"text-align":"right"},attrs:{span:12}},[e("span",{staticClass:"value",staticStyle:{display:"block"}},[t._v("参与人数 ")]),e("h2",{staticStyle:{"margin-top":"10px"}},[t._v(t._s(this.data.count))])])],1),t.load?e("Spin",{attrs:{size:"large",fix:""}}):t._e()],1)],1)},i=[],n=(e("cadf"),e("551c"),e("097d"),e("928d")),u={data:function(){return{load:!1,data:null}},mounted:function(){this.loadData()},methods:{loadData:function(){var t=this;this.load=!0,n["a"].statics({id:this.$route.params.id},function(a){t.load=!1,t.data=a.data.data},function(){t.load=!1})}}},l=u,c=(e("81a2"),e("2877")),r=Object(c["a"])(l,s,i,!1,null,"7596ff1c",null);r.options.__file="statics.vue";a["default"]=r.exports},e9d8:function(t,a,e){}}]);
//# sourceMappingURL=chunk-22982799.592df709.js.map