/*!CK:3258421754!*//*1444747111,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["8PKAL"]); }

__d('OauthLogin',['Cookie','Dialog','PopupWindow','ReloadPage','URI','WindowComm','fbt','XD'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n){if(c.__markCompiled)c.__markCompiled();var o=c('XD').XD;function p(q,r){this.provider=q;this.endpoint=r;return this;}p.prototype.login=function(q,r,s){var t=m.makeHandler((function(w){this._closePopup();var x=this.provider+'..'+w.oauth_token+'..'+w.oauth_token_secret;h.set('tpa',x,0,'/');if(s)p._refreshLoginStatus();q&&q();}).bind(this)),u=m.makeHandler((function(w){this._closePopup();new i().setTitle(n._("Ti\u1ebfc qu\u00e1!")).setBody(n._("Ch\u00fang t\u00f4i g\u1eb7p ph\u1ea3i s\u1ef1 c\u1ed1 khi tr\u00f2 chuy\u1ec7n v\u1edbi {provider}.\u003Cbr \/>H\u00e3y \u0111\u0103ng nh\u1eadp tr\u1ef1c ti\u1ebfp v\u00e0o Facebook ho\u1eb7c th\u1eed l\u1ea1i sau.",[n.param('provider',this.provider)])).setHandler(function(){r&&r();}).setButtons(i.OK).show();}).bind(this)),v=new l(this.endpoint);v.setQueryData({provider:this.provider,next:t,channel_url:u,cancel_url:u,display:'popup'});this._popup=j.open(v.toString(),416,468);};p.prototype._closePopup=function(){if(this._popup){this._popup.close();this._popup=null;}};p._refreshLoginStatus=function(){try{o.send({type:'refreshThirdPartyAuthStatus'});}catch(q){k.now();}};f.exports=p;},null);
__d('OpenIDLogin',['Cookie','Dialog','OpenIDRequest','ReloadPage','fbt','XD'],function a(b,c,d,e,f,g,h,i,j,k,l){if(c.__markCompiled)c.__markCompiled();var m=c('XD').XD,n={login:function(o,p,q,r,s){j.context='tpa';new j().setThirdPartyLogin(true).setSuccessHandler(function(t){var u='OpenID'+'..'+t.oid+'..'+t.secret;h.set('tpa',u,0,'/');if(!!r)n._refreshLoginStatus();p&&p();}).setErrorHandler(function(t){new i().setTitle(l._("Ti\u1ebfc qu\u00e1!")).setBody(l._("Ch\u00fang t\u00f4i g\u1eb7p ph\u1ea3i s\u1ef1 c\u1ed1 khi tr\u00f2 chuy\u1ec7n v\u1edbi {provider}.\u003Cbr \/>H\u00e3y \u0111\u0103ng nh\u1eadp tr\u1ef1c ti\u1ebfp v\u00e0o Facebook ho\u1eb7c th\u1eed l\u1ea1i sau.",[l.param('provider',o)])).setButtons(i.OK).setHandler(function(){q&&q();}).show();}).setProviderCache(s).setOpenIDUrl(o).send();},_refreshLoginStatus:function(){try{m.send({type:'refreshThirdPartyAuthStatus'});}catch(o){k.now();}}};f.exports=n;},null);
__d('MultiLoginPopup',['Arbiter','CommentAdminPanelController','CSS','CurrentUser','Dialog','DOM','DTSG','Event','HTML','OauthLogin','OpenIDLogin','PopupWindow','SelectorDeprecated','URI','WidgetArbiter','WindowComm','$'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x){if(c.__markCompiled)c.__markCompiled();var y={provider:'facebook',providerCache:{},formSubmissionInterceptors:[],init:function(){h.subscribe('platform/socialplugins/login',function(z){y.loggedIn=!!z.user;});t.subscribe('close',function(z,aa){t.setSelected(aa.selector,t.getValue(aa.selector),false);});},setProvider:function(z){y.provider=z;return this;},setProviderCache:function(z){y.providerCache=z;return this;},interceptFormSubmission:function(z,aa,ba,ca){var da=function(ea){if(ea){y.detachExistingSubmissionInterceptors();if(ea.fbDtsg){n.setToken(ea.fbDtsg);k.getID=function(){return ea.user;};}if(ea.isThirdParty==="0"){m.scry(document.documentElement,'.postToProfile').forEach(function(fa){j.show(fa);});m.scry(document.documentElement,'.postToProfileCheckbox').forEach(function(fa){if(ea.postToProfileChecked==="0"){fa.removeAttribute('checked');}else fa.setAttribute('checked','checked');});m.scry(document.documentElement,'.viewerProfileHref').forEach(function(fa){fa.href=ea.profileUrl;fa.onclick='';});m.scry(document.documentElement,'.commentas').forEach(function(fa){var ga=fa.id;m.replace(fa,p(ea.commentAsMarkup));var ha=x(ea.commentAsMarkupID);ha.id=ga;var ia=m.scry(ha,'a.commentaschange');ia.forEach(function(ja){var ka=new u(ja.getAttribute('ajaxify'));ka.addQueryData({uniqid:ga});ja.setAttribute('ajaxify',ka.toString());});});}else m.scry(document.documentElement,'.commentas').forEach(function(fa){var ga=fa.id;m.replace(fa,p(ea.commentAsMarkup));var ha=x(ea.commentAsMarkupID);ha.id=ga;});m.scry(document.documentElement,'.viewerProfilePic').forEach(function(fa){fa.src=ea.profilePic;});m.scry(document.documentElement,'.fbCommentAfterLoginButton').forEach(j.hide);m.scry(document.documentElement,'.fbCommentButton').forEach(j.show);m.scry(document.documentElement,'.fbReplyAfterLoginButton').forEach(j.hide);m.scry(document.documentElement,'.fbReplyButton').forEach(j.show);m.scry(document.documentElement,'.fbUpDownVoteAfterLogin').forEach(j.hide);m.scry(document.documentElement,'.fbUpDownVoteOption').forEach(j.show);m.scry(document.documentElement,'.closeButtonAfterLogin').forEach(j.hide);m.scry(document.documentElement,'.closeButton').forEach(j.show);i.setLoggedIn(parseInt(ea.user,10));h.inform('platform/socialplugins/login',{user:ea.user},h.BEHAVIOR_STATE);v.inform('platform/socialplugins/login',{user:ea.user},h.BEHAVIOR_STATE);}};y.login(ca,z,aa,ba,da);return false;},attachAllFormsToLogin:function(z,aa){y.formSubmissionInterceptors=[];y.popupTitle=z;y.params=aa;y.reattachLoginInterceptors();},reattachLoginInterceptors:function(){y.detachExistingSubmissionInterceptors();var z=['composer','fbUpDownVoteAfterLogin','closeButtonAfterLogin'],aa=y.popupTitle,ba=y.params,ca=function(ea){var fa=ea.getTarget();if(fa.tagName.toLowerCase()==='form'&&z.some(j.hasClass.bind(null,fa)))return y.interceptFormSubmission(fa,aa,ba);},da=o.listen(document.body,'submit',ca,o.Priority.URGENT);y.formSubmissionInterceptors.push(da);},detachExistingSubmissionInterceptors:function(){var z=y.formSubmissionInterceptors.length;for(var aa=0;aa<z;aa++)y.formSubmissionInterceptors[aa].remove();y.formSubmissionInterceptors=[];},login:function(z,aa,ba,ca,da){if(!y.loggedIn)y._openPopup(ca,da);},doOpenIDLogin:function(z,aa,ba){r.login(z,y.tpaLoginCallback(aa),y.tpaLoginCallback(ba),false,y.providerCache);},doOauthWrapLogin:function(z,aa,ba){var ca=new q(z,'/connect/oauthwrap_login.php');return ca.login(y.tpaLoginCallback(aa),y.tpaLoginCallback(ba),false);},doTwitterLogin:function(z,aa){var ba=new q('Twitter','/connect/twitter_login.php');return ba.login();},tpaLoginCallback:function(z){return (function(aa,ba){var ca=m.create('iframe',{src:aa,className:'hidden_elem'});m.appendContent(m.find(ba.documentElement,'body'),ca);}).bind(null,z,document);},loggedIn:false,_popup:null,_openPopup:function(z,aa){var ba=y.provider==='facebook'?'opener':'parent',ca=w.makeHandler(function(ka){y._closePopup();aa&&aa(ka);},ba),da=w.makeHandler(function(ka){y._closePopup();},ba),ea;ea=new u('/plugins/multi_login_popup_loggedin.php');ea.setQueryData({original_next:ca,original_cancel:da,iframe_src:z.iframe_src});ca=ea.getQualifiedURI().toString();if(y.provider==='facebook'){ea=new u('/login.php');ea.setQueryData(Object.assign(z,{display:'popup',social_plugin:'multi_login',cancel_url:da,next:ca,provider:y.provider}));var fa=450,ga=700;this._popup=s.open(ea.toString(),fa,ga);}else if(y.provider==='twitter'){y.doTwitterLogin(ca,da);}else if(y.provider==='microsoft'){y.doOauthWrapLogin(y.provider,ca,da);}else if(y.provider==='openid'){var ha=new l(),ia=function(ka){var la=ha.getFormData();y.doOpenIDLogin(la.openid_url,ca,da);ha.hide();if(ka.kill)ka.kill();return false;};ha.setContentWidth(350).setTitle('OpenID').setBody(m.create('form',{onsubmit:ia},m.create('input',{type:'text',size:60,name:'openid_url'}))).setHandler(ia).setButtons([l.CONFIRM,l.CANCEL]).show();}else{var ja=y.provider+'.com';y.doOpenIDLogin(ja,ca,da);}},_closePopup:function(){if(this._popup){this._popup.close();this._popup=null;}}};f.exports=y;},null);