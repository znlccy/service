(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-7d0ae44b"],{"1e6a":function(t,e,i){},3845:function(t,e,i){"use strict";var a=i("1e6a"),o=i.n(a);o.a},"928d":function(t,e,i){"use strict";i.d(e,"a",function(){return s});var a=i("c665"),o=i("aa9a"),n=i("4a2d"),s=function(){function t(){Object(a["a"])(this,t)}return Object(o["a"])(t,null,[{key:"index",value:function(t,e,i){n["a"].request(this.uri()+"index",e,i,t)}},{key:"save",value:function(t,e,i){n["a"].request(this.uri()+"save",e,i,t)}},{key:"detail",value:function(t,e,i){n["a"].request(this.uri()+"detail",e,i,t)}},{key:"delete",value:function(t,e,i){n["a"].request(this.uri()+"delete",e,i,t)}},{key:"statics",value:function(t,e,i){n["a"].request(this.uri()+"statics",e,i,t)}},{key:"uri",value:function(){return n["a"].url()+"investigate/"}}]),t}()},ae1c:function(t,e,i){"use strict";i.r(e);var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",[i("h3",[t._v("问卷调查")]),i("Divider",{attrs:{orientation:"left"}},[t._v("信息填写")]),i("Row",[i("Col",[i("Form",{attrs:{model:t.formData,"label-width":100}},[i("FormItem",{attrs:{label:"标题"}},[i("Input",{attrs:{placeholder:"请填写标题"},model:{value:t.formData.title,callback:function(e){t.$set(t.formData,"title",e)},expression:"formData.title"}})],1),i("FormItem",{attrs:{label:"状态"}},[i("RadioGroup",{model:{value:t.formData.status,callback:function(e){t.$set(t.formData,"status",e)},expression:"formData.status"}},[i("Radio",{attrs:{label:0}},[i("span",[t._v("不可用")])]),i("Radio",{attrs:{label:1}},[i("span",[t._v("可用")])])],1)],1),i("Divider"),t._l(t.questions,function(e,a){return i("div",{key:a},[i("Row",[i("Col",{attrs:{span:8}},[i("FormItem",{attrs:{label:"问题:"}},[i("Input",{attrs:{placeholder:"请填写标题"},model:{value:e.title,callback:function(i){t.$set(e,"title",i)},expression:"question.title"}})],1)],1),i("Col",{attrs:{span:6}},[i("FormItem",{attrs:{label:"类型:"}},[i("Select",{model:{value:e.type,callback:function(i){t.$set(e,"type",i)},expression:"question.type"}},[i("Option",{attrs:{value:1}},[t._v("单选")]),i("Option",{attrs:{value:2}},[t._v("复选")]),i("Option",{attrs:{value:3}},[t._v("文本框")])],1)],1)],1),2===e.type?i("Col",{attrs:{span:4}},[i("FormItem",{attrs:{label:"最大可选:"}},[i("InputNumber",{attrs:{max:e.option.length,min:1},model:{value:e.max,callback:function(i){t.$set(e,"max",i)},expression:"question.max"}})],1)],1):t._e(),i("Col",{staticStyle:{"line-height":"40px","text-align":"center"},attrs:{span:4}},[i("Checkbox",{model:{value:e.must,callback:function(i){t.$set(e,"must",i)},expression:"question.must"}},[t._v(" 必填")]),i("a",{staticStyle:{"line-height":"40px","margin-left":"20px"},on:{click:function(e){t.delQuestion(a)}}},[t._v("删除")])],1)],1),3!==e.type?i("div",t._l(e.option,function(a,o){return i("Row",{key:o},[i("Col",{attrs:{span:8}},[i("FormItem",{attrs:{label:"选项:"}},[i("Input",{attrs:{placeholder:"请填写选项"},model:{value:a.title,callback:function(e){t.$set(a,"title",e)},expression:"option.title"}})],1)],1),i("a",{directives:[{name:"show",rawName:"v-show",value:0===o,expression:"optionIndex===0"}],staticStyle:{"line-height":"40px","margin-left":"20px"},on:{click:function(i){t.addOption(e)}}},[t._v("增加")]),i("a",{directives:[{name:"show",rawName:"v-show",value:0!==o,expression:"optionIndex!==0"}],staticStyle:{"line-height":"40px","margin-left":"20px"},on:{click:function(i){t.delOption(e,o)}}},[t._v("删除")])],1)})):t._e(),i("Divider")],1)}),i("FormItem",[i("Button",{attrs:{type:"dashed",icon:"md-add",long:""},on:{click:t.add}},[t._v("新增问题")])],1),i("FormItem",[i("Button",{attrs:{type:"success",long:""},on:{click:t.submit}},[t._v("提交")])],1)],2),t.load?i("Spin",{attrs:{size:"large",fix:""}}):t._e()],1)],1)],1)},o=[],n=(i("ac6a"),i("928d")),s={name:"edit",data:function(){return{formData:{title:"",status:0},load:!1,times:[],questions:[{must:!0,type:1,option:[{}]}]}},mounted:function(){null!=this.$route.query.id&&this.loadData()},methods:{loadData:function(){var t=this;this.load=!0,n["a"].detail({id:this.$route.query.id},function(e){t.load=!1,t.formData=e.data.data,t.questions=e.data.data.question,t.questions.forEach(function(t){t.must=1===t.must})},function(){t.load=!1})},add:function(){this.questions.push({type:1,option:[{}]})},addOption:function(t){t.option.push({})},delOption:function(t,e){t.option.splice(e,1)},delQuestion:function(t){this.questions.splice(t,1)},submit:function(){var t=this,e={question:[]};if(this.$formUtil.isStrValid(this.formData.title)){e.title=this.formData.title;for(var i=0;i<this.questions.length;i++){var a={option:[]},o=this.questions[i];if(!this.$formUtil.isStrValid(o.title))return void this.$Message.error("问题标题不能为空");if(a.title=o.title,a.must=o.must?1:0,a.type=o.type,a.max=o.max,3!==o.type)for(var s=0;s<o.option.length;s++){if(!this.$formUtil.isStrValid(o.option[s].title))return void this.$Message.error("问题"+o.title+"选项不能为空");a.option.push(o.option[s].title)}e.question.push(a)}this.load=!0,console.log(e),n["a"].save(e,function(){t.load=!1,t.$router.push({name:"investigate"})},function(){t.load=!1})}else this.$Message.error("标题不能为空")}}},l=s,r=(i("3845"),i("2877")),u=Object(r["a"])(l,a,o,!1,null,"3eb5529c",null);u.options.__file="edit.vue";e["default"]=u.exports}}]);
//# sourceMappingURL=chunk-7d0ae44b.f7211ff6.js.map