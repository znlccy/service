(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-68460712"],{"11d9":function(t,e,a){"use strict";function r(t){return r=Object.getPrototypeOf||function(t){return t.__proto__},r(t)}a.d(e,"a",function(){return r})},"51b7":function(t,e,a){},6544:function(t,e,a){"use strict";a.d(e,"a",function(){return l});var r=a("c665"),i=a("dc0a"),o=a("aa9a"),n=a("d328"),s=a("11d9"),u=a("4a2d"),l=function(t){function e(){return Object(r["a"])(this,e),Object(n["a"])(this,Object(s["a"])(e).apply(this,arguments))}return Object(o["a"])(e,null,[{key:"roleList",value:function(t,e,a){u["a"].request(this.uri()+"role_list",e,a,t)}},{key:"add",value:function(t,e,a){u["a"].request(this.uri()+"add",e,a,t)}},{key:"delete",value:function(t,e,a){u["a"].request(this.uri()+"delete",e,a,t)}},{key:"detail",value:function(t,e,a){u["a"].request(this.uri()+"detail",e,a,t)}},{key:"permissions",value:function(t,e,a){u["a"].request(this.uri()+"get_role_permission",e,a,t)}},{key:"assignRolePermission",value:function(t,e,a){u["a"].request(this.uri()+"assign_role_permission",e,a,t)}},{key:"uri",value:function(){return u["a"].url()+"role/"}}]),Object(i["a"])(e,t),e}(u["a"])},d328:function(t,e,a){"use strict";var r=a("6bde");function i(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function o(t,e){return!e||"object"!==Object(r["a"])(e)&&"function"!==typeof e?i(t):e}a.d(e,"a",function(){return o})},d371:function(t,e,a){"use strict";a.d(e,"a",function(){return n});var r=a("c665"),i=a("aa9a"),o=a("4a2d"),n=function(){function t(){Object(r["a"])(this,t)}return Object(i["a"])(t,null,[{key:"select",value:function(t,e){o["a"].request(this.uri()+"select",t,e)}},{key:"index",value:function(t,e,a){o["a"].request(this.uri()+"index",e,a,t)}},{key:"save",value:function(t,e,a){o["a"].request(this.uri()+"save",e,a,t)}},{key:"delete",value:function(t,e,a){o["a"].request(this.uri()+"delete",e,a,t)}},{key:"detail",value:function(t,e,a){o["a"].request(this.uri()+"detail",e,a,t)}},{key:"leader",value:function(t,e,a){o["a"].request(this.uri()+"leader",e,a,t)}},{key:"flowDesign",value:function(t,e,a){o["a"].request(this.uri()+"flow_design",e,a,t)}},{key:"flowList",value:function(t,e,a){o["a"].request(this.uri()+"flow_list",e,a,t)}},{key:"uri",value:function(){return o["a"].url()+"operation_team/"}}]),t}()},dc0a:function(t,e,a){"use strict";function r(t,e){return r=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},r(t,e)}function i(t,e){if("function"!==typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");r(t.prototype,e&&e.prototype),e&&r(t,e)}a.d(e,"a",function(){return i})},e600:function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("h3",[t._v("角色信息编辑")]),a("Divider",{attrs:{orientation:"left"}},[t._v("信息填写")]),a("Row",[a("Col",{attrs:{xs:24,sm:24,md:12,lg:12}},[a("Form",{attrs:{model:t.formData,"label-width":80}},[a("FormItem",{attrs:{label:"名称"}},[a("Input",{attrs:{placeholder:"请填写名称"},model:{value:t.formData.name,callback:function(e){t.$set(t.formData,"name",e)},expression:"formData.name"}})],1),a("FormItem",{attrs:{label:"状态"}},[a("Select",{model:{value:t.formData.status,callback:function(e){t.$set(t.formData,"status",e)},expression:"formData.status"}},[a("Option",{attrs:{label:"禁用",value:0}}),a("Option",{attrs:{label:"正常",value:1}})],1)],1),a("FormItem",{attrs:{label:"排序"}},[a("Input",{attrs:{placeholder:"请填写排序"},model:{value:t.formData.sort_num,callback:function(e){t.$set(t.formData,"sort_num",e)},expression:"formData.sort_num"}})],1),a("FormItem",{attrs:{label:"角色类型"}},[a("Select",{model:{value:t.formData.type,callback:function(e){t.$set(t.formData,"type",e)},expression:"formData.type"}},[a("Option",{attrs:{label:"内置角色",value:0}}),a("Option",{attrs:{label:"自建角色",value:1}})],1)],1),a("FormItem",{attrs:{label:"运营团队"}},[a("Select",{model:{value:t.formData.operation_team_id,callback:function(e){t.$set(t.formData,"operation_team_id",e)},expression:"formData.operation_team_id"}},t._l(t.teams,function(t,e){return a("Option",{key:e,attrs:{label:t.name,value:t.id}})}))],1),a("FormItem",{attrs:{label:"简介"}},[a("Input",{attrs:{type:"textarea",rows:4,placeholder:"请填写简介"},model:{value:t.formData.description,callback:function(e){t.$set(t.formData,"description",e)},expression:"formData.description"}})],1),a("FormItem",[a("Button",{attrs:{type:"success",long:""},on:{click:t.submit}},[t._v("提交")])],1)],1),t.load?a("Spin",{attrs:{size:"large",fix:""}}):t._e()],1)],1)],1)},i=[],o=(a("7f7f"),a("d371")),n=a("6544"),s={name:"edit",data:function(){return{formData:{},teams:[],load:!1}},mounted:function(){this.loadTeam(),null!=this.$route.query.id&&this.loadData(),null!=this.$route.query.operation_team_id&&(this.formData.operation_team_id=parseInt(this.$route.query.operation_team_id))},methods:{loadTeam:function(){var t=this;o["a"].select(function(e){console.assert(e),t.teams=e.data.data})},loadData:function(){var t=this;this.load=!0,n["a"].detail({id:this.$route.query.id},function(e){t.load=!1,t.formData=e.data.data},function(){t.load=!1})},submit:function(){var t=this;this.$formUtil.isStrValid(this.formData.name)?this.$formUtil.isStrValid(this.formData.status)?this.$formUtil.isStrValid(this.formData.sort_num)?this.$formUtil.isStrValid(this.formData.type)?this.$formUtil.isStrValid(this.formData.operation_team_id)?this.$formUtil.isStrValid(this.formData.description)?(this.load=!0,n["a"].add(this.formData,function(e){t.load=!1,t.$router.back()},function(){t.load=!1})):this.$Message.error("请输入简介"):this.$Message.error("请选择运营团队"):this.$Message.error("请选择角色类型"):this.$Message.error("请输入排序"):this.$Message.error("请选择状态"):this.$Message.error("请输入名称")}}},u=s,l=(a("fed9"),a("2877")),c=Object(l["a"])(u,r,i,!1,null,"9d7eb73e",null);c.options.__file="edit.vue";e["default"]=c.exports},fed9:function(t,e,a){"use strict";var r=a("51b7"),i=a.n(r);i.a}}]);
//# sourceMappingURL=chunk-68460712.c5f6972f.js.map