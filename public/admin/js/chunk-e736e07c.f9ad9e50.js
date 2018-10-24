(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-e736e07c"],{"11d9":function(t,e,a){"use strict";function i(t){return i=Object.getPrototypeOf||function(t){return t.__proto__},i(t)}a.d(e,"a",function(){return i})},6290:function(t,e,a){},"9e51":function(t,e,a){},b3e2:function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("h3",[t._v("管理员信息编辑")]),a("Divider",{attrs:{orientation:"left"}},[t._v("信息填写")]),a("Row",[a("Col",{attrs:{xs:24,sm:24,md:12,lg:12}},[a("Form",{attrs:{model:t.formData,"label-width":80}},[a("FormItem",{attrs:{label:"名称"}},[a("Input",{attrs:{placeholder:"请填写团队名称"},model:{value:t.formData.name,callback:function(e){t.$set(t.formData,"name",e)},expression:"formData.name"}})],1),a("FormItem",{attrs:{label:"简介"}},[a("Input",{attrs:{type:"textarea",rows:4,placeholder:"请填写团队简介"},model:{value:t.formData.description,callback:function(e){t.$set(t.formData,"description",e)},expression:"formData.description"}})],1),a("FormItem",{attrs:{label:"管理模式"}},[a("RadioGroup",{model:{value:t.formData.management_type,callback:function(e){t.$set(t.formData,"management_type",e)},expression:"formData.management_type"}},[a("Radio",{attrs:{label:0}},[t._v("联合运营")]),a("Radio",{attrs:{label:1}},[t._v("自营")])],1)],1),a("FormItem",{attrs:{label:"负责人"}},[a("Select",{model:{value:t.formData.leader_id,callback:function(e){t.$set(t.formData,"leader_id",e)},expression:"formData.leader_id"}},t._l(t.leaders,function(t,e){return a("Option",{key:e,attrs:{label:t.nickname,value:t.id}})}))],1)],1),t.load?a("Spin",{attrs:{size:"large",fix:""}}):t._e()],1),null!=t.$route.query.id?a("Col",{attrs:{span:24}},[a("Role",{ref:"role"}),a("Admin",{ref:"admin"}),a("Mode",{ref:"mode"})],1):t._e(),a("Button",{staticStyle:{width:"51%"},attrs:{type:"success"},on:{click:t.submit}},[t._v("提交")])],1)],1)},n=[],r=(a("7f7f"),a("d371")),o=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("Divider",{attrs:{orientation:"left"}},[t._v("角色列表")]),t.load?a("Spin",{attrs:{size:"large",fix:""}}):t._e(),a("div",{staticClass:"filter-btn"},[a("Button",{staticStyle:{"font-weight":"bold",margin:"10px 0"},attrs:{type:"success",icon:"md-add"},on:{click:function(e){t.add()}}},[t._v("新建")])],1),a("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.listData.last_page>1?a("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[a("Page",{attrs:{total:t.listData.total,"page-size":parseInt(t.listData.per_page),current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},s=[],l=a("c665"),u=a("dc0a"),c=a("aa9a"),d=a("d328"),f=a("11d9"),m=a("4a2d"),p=function(t){function e(){return Object(l["a"])(this,e),Object(d["a"])(this,Object(f["a"])(e).apply(this,arguments))}return Object(c["a"])(e,null,[{key:"roleList",value:function(t,e,a){m["a"].request(this.uri()+"role_list",e,a,t)}},{key:"add",value:function(t,e,a){m["a"].request(this.uri()+"add",e,a,t)}},{key:"delete",value:function(t,e,a){m["a"].request(this.uri()+"delete",e,a,t)}},{key:"detail",value:function(t,e,a){m["a"].request(this.uri()+"detail",e,a,t)}},{key:"permissions",value:function(t,e,a){m["a"].request(this.uri()+"get_role_permission",e,a,t)}},{key:"assignRolePermission",value:function(t,e,a){m["a"].request(this.uri()+"assign_role_permission",e,a,t)}},{key:"uri",value:function(){return m["a"].url()+"role/"}}]),Object(u["a"])(e,t),e}(m["a"]),h={name:"index",data:function(){var t=this;return{load:!1,formData:{},listData:{},operation_team_id:null,columns:[{title:"名称",key:"name"},{title:"描述",key:"description"},{title:"创建日期",key:"create_time"},{title:"角色类型",render:function(t,e){return t("span",0===e.row.type?"内置角色":"自建角色")}},{title:"状态",key:"status",align:"center",render:function(t,e){return t("span",0===e.row.status?"禁用":"正常")}},{title:"Action",width:200,align:"center",render:function(e,a){return e("div",[e("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.add(a.row.id)}}},"编辑"),e("Button",{props:{type:"error",size:"small"},style:{marginRight:"5px",display:0===a.row.type?"none":"inline"},on:{click:function(){t.del(a.row)}}},"删除")])}}]}},methods:{loadData:function(t,e){var a=this;t&&(this.formData.jump_page=t),null!==e?this.operation_team_id=e:e=this.operation_team_id,this.formData.operation_team_id=e,this.load=!0,p.roleList(this.formData,function(t){a.listData=t.data.data,a.load=!1},function(){a.load=!1})},ref:function(){this.formData={},this.loadData(1)},add:function(t){this.$router.push({name:"roleEdit",query:{id:t,operation_team_id:this.formData.operation_team_id}})},del:function(t){var e=this;this.$Modal.confirm({title:"确定删除"+t.name+"吗?",okText:"删除",cancelText:"取消",loading:!0,onOk:function(){p.delete({id:t.id},function(){e.$Modal.remove(),e.$Message.success("删除成功"),e.loadData(1)},function(){e.$Modal.remove()})}})}}},_=h,v=a("2877"),y=Object(v["a"])(_,o,s,!1,null,null,null);y.options.__file="index.vue";var g=y.exports,D=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("Divider",{attrs:{orientation:"left"}},[t._v("用户列表")]),a("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.load?a("Spin",{attrs:{size:"large",fix:""}}):t._e(),a("div",{staticClass:"filter-btn"},[a("Button",{staticStyle:{"font-weight":"bold",margin:"10px 0"},attrs:{type:"success",icon:"md-add"},on:{click:function(e){t.add()}}},[t._v("新建")])],1),t.listData.last_page>1?a("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[a("Page",{attrs:{total:t.listData.total,"page-size":t.listData.per_page,current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},k=[],b=(a("ac6a"),function(t){function e(){return Object(l["a"])(this,e),Object(d["a"])(this,Object(f["a"])(e).apply(this,arguments))}return Object(c["a"])(e,null,[{key:"adminList",value:function(t,e,a){m["a"].request(this.uri()+"admin_list",e,a,t)}},{key:"roleList",value:function(t,e,a){m["a"].request(this.uri()+"role",e,a,t)}},{key:"create",value:function(t,e,a){m["a"].request(this.uri()+"create",e,a,t)}},{key:"detail",value:function(t,e,a){m["a"].request(this.uri()+"detail",e,a,t)}},{key:"role",value:function(t,e,a){m["a"].request(this.uri()+"role",e,a,t)}},{key:"spinner",value:function(t,e){m["a"].request(this.uri()+"spinner",t,e)}},{key:"assignUserRole",value:function(t,e,a){m["a"].request(this.uri()+"assign_user_role",e,a,t)}},{key:"pwd",value:function(t,e,a){m["a"].request(this.uri()+"change_password",e,a,t)}},{key:"info",value:function(t,e){m["a"].request(this.uri()+"info",t,e)}},{key:"uri",value:function(){return m["a"].url()+"admin/"}}]),Object(u["a"])(e,t),e}(m["a"])),w={name:"index",data:function(){var t=this;return{formData:{},listData:{},load:!1,operation_team_id:null,columns:[{title:"真实姓名",align:"center",key:"real_name"},{title:"手机",align:"center",key:"mobile"},{title:"角色",render:function(e,a){return e("span",t.getRoles(a.row.role))}},{title:"状态",key:"status",align:"center",render:function(t,e){return t("span",0===e.row.status?"禁用":"正常")}},{title:"Action",width:200,align:"center",render:function(e,a){return e("div",[e("Button",{props:{type:"success",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.add(a.row.id)}}},"编辑"),e("Button",{props:{type:"error",size:"small"},style:{marginRight:"5px"},on:{click:function(){t.del(a.row)}}},"删除")])}}]}},methods:{getRoles:function(t){var e="";return null!=t&&t.length>0&&t.forEach(function(t){e+=t.name+","}),e},loadData:function(t,e){var a=this;null!==e?this.operation_team_id=e:e=this.operation_team_id,t&&(this.formData.jump_page=t),this.formData.operation_team_id=e,this.load=!0,b.adminList(this.formData,function(t){a.listData=t.data.data,a.load=!1},function(){a.load=!1})},add:function(t){this.$router.push({name:"adminEdit",query:{id:t,operation_team_id:this.formData.operation_team_id}})},ref:function(){this.formData={},this.loadData(1)},del:function(t){var e=this;this.$Modal.confirm({title:"确定删除"+t.name+"吗?",okText:"删除",cancelText:"取消",loading:!0,onOk:function(){b.delete({id:t.id},function(){e.$Modal.remove(),e.$Message.success("删除成功"),e.loadData()},function(){e.$Modal.remove()})}})}}},x=w,$=Object(v["a"])(x,D,k,!1,null,null,null);$.options.__file="index.vue";var q=$.exports,O=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("Divider",{attrs:{orientation:"left"}},[t._v("管理模式列表")]),t.load?a("Spin",{attrs:{size:"large",fix:""}}):t._e(),a("div",{staticClass:"filter-btn"},[a("Button",{staticStyle:{"font-weight":"bold",margin:"10px 0"},attrs:{type:"success",icon:"md-add"},on:{click:function(e){t.add()}}},[t._v("新建")])],1),a("Table",{attrs:{stripe:"",border:"",columns:t.columns,data:t.listData.data}}),t.listData.last_page>1?a("Row",{staticStyle:{"text-align":"center","margin-top":"20px"}},[a("Page",{attrs:{total:t.listData.total,"page-size":parseInt(t.listData.per_page),current:t.listData.current_page,size:"small"},on:{"on-change":t.loadData}})],1):t._e()],1)},j=[],R={data:function(){var t=this;return{listData:{},load:!1,operation_team_id:null,columns:[{title:"名称",align:"center",key:"flow_name"},{title:"状态",key:"status",align:"center",render:function(t,e){return t("span",0===e.row.status?"未设置":"已设置")}},{title:"Action",width:200,align:"center",render:function(e,a){return e("div",[e("Button",{props:{type:"success",size:"small",disabled:0!==a.row.is_edit},style:{marginRight:"5px"},on:{click:function(){t.edit(a.row.id)}}},"编辑")])}}]}},mounted:function(){},methods:{loadData:function(t,e){var a=this;null!==e?this.operation_team_id=e:e=this.operation_team_id;var i={jump_page:t,operation_team_id:e};r["a"].flowList(i,function(t){a.listData=t.data.data.flow})},edit:function(t){this.$router.push({name:"operationModeEdit",params:{flow_id:t}})}}},S=R,z=(a("dc30"),Object(v["a"])(S,O,j,!1,null,"a287ea8a",null));z.options.__file="index.vue";var M=z.exports,E={components:{Role:g,Admin:q,Mode:M},name:"edit",data:function(){return{formData:{},teams:[],roles:[],departments:[],leaders:[],load:!1}},mounted:function(){null!=this.$route.query.id&&(this.loadData(),this.loadLeader(),this.$refs.role.loadData(1,this.$route.query.id),this.$refs.admin.loadData(1,this.$route.query.id),this.$refs.mode.loadData(1,this.$route.query.id))},methods:{loadData:function(){var t=this;this.load=!0,r["a"].detail({id:this.$route.query.id},function(e){t.load=!1,t.formData=e.data.data},function(){t.load=!1})},loadLeader:function(){var t=this;r["a"].leader({operation_team_id:this.$route.query.id},function(e){t.leaders=e.data.data})},submit:function(){var t=this;this.$formUtil.isStrValid(this.formData.name)?this.$formUtil.isStrValid(this.formData.description)?this.$formUtil.isStrValid(this.formData.management_type)?(this.load=!0,r["a"].save(this.formData,function(e){t.load=!1,t.$router.push({name:"operation_team"})},function(){t.load=!1})):this.$Message.error("请选择管理模式"):this.$Message.error("请输入简介"):this.$Message.error("请输入名称")}}},B=E,L=(a("ffde"),Object(v["a"])(B,i,n,!1,null,"71d1c836",null));L.options.__file="edit.vue";e["default"]=L.exports},d328:function(t,e,a){"use strict";var i=a("6bde");function n(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function r(t,e){return!e||"object"!==Object(i["a"])(e)&&"function"!==typeof e?n(t):e}a.d(e,"a",function(){return r})},d371:function(t,e,a){"use strict";a.d(e,"a",function(){return o});var i=a("c665"),n=a("aa9a"),r=a("4a2d"),o=function(){function t(){Object(i["a"])(this,t)}return Object(n["a"])(t,null,[{key:"select",value:function(t,e){r["a"].request(this.uri()+"select",t,e)}},{key:"index",value:function(t,e,a){r["a"].request(this.uri()+"index",e,a,t)}},{key:"save",value:function(t,e,a){r["a"].request(this.uri()+"save",e,a,t)}},{key:"delete",value:function(t,e,a){r["a"].request(this.uri()+"delete",e,a,t)}},{key:"detail",value:function(t,e,a){r["a"].request(this.uri()+"detail",e,a,t)}},{key:"leader",value:function(t,e,a){r["a"].request(this.uri()+"leader",e,a,t)}},{key:"flowDesign",value:function(t,e,a){r["a"].request(this.uri()+"flow_design",e,a,t)}},{key:"flowList",value:function(t,e,a){r["a"].request(this.uri()+"flow_list",e,a,t)}},{key:"uri",value:function(){return r["a"].url()+"operation_team/"}}]),t}()},dc0a:function(t,e,a){"use strict";function i(t,e){return i=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},i(t,e)}function n(t,e){if("function"!==typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");i(t.prototype,e&&e.prototype),e&&i(t,e)}a.d(e,"a",function(){return n})},dc30:function(t,e,a){"use strict";var i=a("9e51"),n=a.n(i);n.a},ffde:function(t,e,a){"use strict";var i=a("6290"),n=a.n(i);n.a}}]);
//# sourceMappingURL=chunk-e736e07c.f9ad9e50.js.map