if (self.CavalryLogger) { CavalryLogger.start_js(["o1SkF"]); }

__d("LeonNonDisclosureIntentTypes",[],(function a(b,c,d,e,f,g){f.exports={LeonNonDisclosureIntentTypes:{NOTIFY_USER:"notify user",SEEKING:"seeking",PHYSICAL_HARM:"physical harm"}};}),null);
__d('ScrollPerfLogger',['BanzaiODS','BanzaiScuba','CurrentUser','Event','Run','ScriptPath','SubscriptionsHandler','forEachObject','nativeRequestAnimationFrame','requestAnimationFrame'],(function a(b,c,d,e,f,g){function h(){return !!c('nativeRequestAnimationFrame');}function i(){if(m[0]>s.max_frames){j();o=!s.continuous;if(o){r&&r.release();r=null;}else{k();c('requestAnimationFrame')(i);}return;}if(o)return;var w=Date.now();if(w-p<s.max_idle_time)c('forEachObject')(m,function(x,y){if(w-q>y)m[y]++;});q=w;c('requestAnimationFrame')(i);}function j(){if(o||m[0]<s.min_frames)return;var w=new (c('BanzaiScuba'))('scroll',null,{addBrowserFields:true});w.addNormal('experiment',n);w.addNormal('time_bucket',l());w.addNormal('script_path',c('ScriptPath').getScriptPath());w.addNormal('user_id',c('CurrentUser').getID());w.addNormal('is_employee',c('CurrentUser').isEmployee()+'');for(var x in t)w.addNormal(x,t[x]);var y={};for(var z in m){if(z===0)continue;y[z]=Math.round(m[z]/m[0]*s.count_ratio);}for(z in y){if(z===0)continue;w.addInteger('freeze'+z,y[z]);c('BanzaiODS').bumpEntityKey('www_scroll','freeze'+z,y[z]);c('BanzaiODS').bumpEntityKey('www_scroll',c('ScriptPath').getScriptPath()+'.freeze'+z,y[z]);}w.addInteger('total_frames',m[0]);w.post();}function k(){m={100:0,200:0,500:0,1000:0,2000:0,5000:0,10000:0,20000:0,30000:0};for(var w=0;w<=50;w++)m[w]=0;q=Date.now();}function l(){var w=Date.now()-u;if(w<=300000){return '0 - 5m';}else if(w<=600000){return '5 - 10m';}else if(w<=1800000){return '10 - 30m';}else if(w<=3600000){return '30 - 60m';}else return '1+ h';}var m,n='',o,p=0,q=0,r,s,t,u,v={init:function w(x,y,z){if(n!==''||y&&y.must_support_raf&&!h())return;n=x;s=y;t=z||{};u=Date.now();o=false;r=new (c('SubscriptionsHandler'))();r.addSubscriptions(c('Event').listen(window,'scroll',function(){p=Date.now();}));k();c('requestAnimationFrame')(i);c('Run').onLeave(function(){j();o=true;r.release();r=null;});}};f.exports=v;}),null);