(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-6a6c9fd8"],{"30fa":function(t,a,e){},"446f":function(t,a,e){"use strict";e.r(a);var n=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("h3",[t._v("合同模板信息编辑")]),e("Divider",{attrs:{orientation:"left"}},[t._v("信息填写")]),e("Row",[e("Col",{attrs:{xs:24,sm:24,md:24,lg:24}},[e("Form",{attrs:{model:t.formData,"label-width":100}},[e("FormItem",{attrs:{label:"模板ID"}},[e("Input",{attrs:{placeholder:"请填写模板编号"},model:{value:t.formData.template_no,callback:function(a){t.$set(t.formData,"template_no",a)},expression:"formData.template_no"}})],1),e("FormItem",{attrs:{label:"模板名称"}},[e("Input",{attrs:{placeholder:"请填写模板名称"},model:{value:t.formData.name,callback:function(a){t.$set(t.formData,"name",a)},expression:"formData.name"}})],1),e("FormItem",{attrs:{label:"模板备注"}},[e("Input",{attrs:{placeholder:"请填写模板备注"},model:{value:t.formData.remark,callback:function(a){t.$set(t.formData,"remark",a)},expression:"formData.remark"}})],1),e("FormItem",{attrs:{label:"状态"}},[e("Select",{model:{value:t.formData.status,callback:function(a){t.$set(t.formData,"status",a)},expression:"formData.status"}},[e("Option",{attrs:{label:"不可用",value:0}}),e("Option",{attrs:{label:"可用",value:1}})],1)],1),e("FormItem",[e("rich-view",{model:{value:t.formData.rich_text,callback:function(a){t.$set(t.formData,"rich_text",a)},expression:"formData.rich_text"}})],1),e("FormItem",{attrs:{label:"自定义变量"}},[t._l(t.formData.content,function(a,n){return t.formData.content?e("Row",{key:n,staticStyle:{"margin-bottom":"20px"}},[e("Col",{staticStyle:{"text-align":"center"},attrs:{span:2}},[t._v("\n              名称\n            ")]),e("Col",{attrs:{span:8}},[e("Input",{attrs:{placeholder:"请输入变量名称"},model:{value:a.name,callback:function(e){t.$set(a,"name",e)},expression:"item.name"}})],1),e("Col",{staticStyle:{"text-align":"center"},attrs:{span:2}},[t._v("\n              替换符\n            ")]),e("Col",{attrs:{span:8}},[e("Input",{attrs:{placeholder:"请输入变量替换符"},model:{value:a.placeholder,callback:function(e){t.$set(a,"placeholder",e)},expression:"item.placeholder"}})],1),e("Col",{staticStyle:{"text-align":"center"},attrs:{span:4}},[e("Button",{attrs:{type:"error"},on:{click:function(a){t.deleteIndex(n)}}},[t._v("删除")])],1)],1):t._e()}),e("Col",{staticStyle:{"text-align":"center"},attrs:{span:22}},[e("Button",{attrs:{type:"primary"},on:{click:t.addContent}},[t._v("新增自定义变量")])],1)],2),e("FormItem",[e("Button",{attrs:{type:"success",long:""},on:{click:t.submit}},[t._v("提交")])],1)],1),t.load?e("Spin",{attrs:{size:"large",fix:""}}):t._e()],1)],1)],1)},o=[],r=e("fc38"),l={name:"edit",data:function(){return{formData:{},load:!1}},mounted:function(){null!=this.$route.query.id&&this.loadData()},methods:{loadData:function(){var t=this;this.load=!0,r["a"].detail({id:this.$route.query.id},function(a){t.load=!1,t.formData=a.data.data,t.formData.space_id=t.formData.space.id},function(){t.load=!1})},addContent:function(){null==this.formData.content&&(this.formData.content=[]),this.formData.content.push({name:"",placeholder:""})},deleteIndex:function(t){this.formData.content.splice(t,1)},submit:function(){var t=this;this.load=!0,r["a"].save(this.formData,function(){t.load=!1,t.$router.push({name:"contract_template"})},function(){t.load=!1})}}},i=l,s=(e("d086"),e("2877")),c=Object(s["a"])(i,n,o,!1,null,"5f0353fe",null);c.options.__file="edit.vue";a["default"]=c.exports},d086:function(t,a,e){"use strict";var n=e("30fa"),o=e.n(n);o.a},fc38:function(t,a,e){"use strict";e.d(a,"a",function(){return l});var n=e("c665"),o=e("aa9a"),r=e("4a2d"),l=function(){function t(){Object(n["a"])(this,t)}return Object(o["a"])(t,null,[{key:"index",value:function(t,a,e){r["a"].request(this.uri()+"index",a,e,t)}},{key:"save",value:function(t,a,e){r["a"].request(this.uri()+"save",a,e,t)}},{key:"detail",value:function(t,a,e){r["a"].request(this.uri()+"detail",a,e,t)}},{key:"delete",value:function(t,a,e){r["a"].request(this.uri()+"delete",a,e,t)}},{key:"select",value:function(t,a){r["a"].request(this.uri()+"select",t,a)}},{key:"uri",value:function(){return r["a"].url()+"contract_template/"}}]),t}()}}]);
//# sourceMappingURL=chunk-6a6c9fd8.51b5915c.js.map