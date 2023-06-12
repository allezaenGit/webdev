/**
 * @license
 * Copyright (c) 2018 amCharts (Antanas Marcelionis, Martynas Majeris)
 *
 * This sofware is provided under multiple licenses. Please see below for
 * links to appropriate usage.
 *
 * Free amCharts linkware license. Details and conditions:
 * https://github.com/amcharts/amcharts4/blob/master/LICENSE
 *
 * One of the amCharts commercial licenses. Details and pricing:
 * https://www.amcharts.com/online-store/
 * https://www.amcharts.com/online-store/licenses-explained/
 *
 * If in doubt, contact amCharts at contact@amcharts.com
 *
 * PLEASE DO NOT REMOVE THIS COPYRIGHT NOTICE.
 * @hidden
 */
am4internal_webpackJsonp(["6b72"],{"1NAr":function(t,e,r){var i,a,n;!function(r,o){a=[t],void 0===(n="function"==typeof(i=o)?i.apply(e,a):i)||(t.exports=n)}(0,function(t){"use strict";var e=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var r=arguments[e];for(var i in r)Object.prototype.hasOwnProperty.call(r,i)&&(t[i]=r[i])}return t};var r={order:2,precision:2,period:null};function i(t,e){var r=[],i=[];t.forEach(function(t,a){null!==t[1]&&(i.push(t),r.push(e[a]))});var a=i.reduce(function(t,e){return t+e[1]},0)/i.length,n=i.reduce(function(t,e){var r=e[1]-a;return t+r*r},0);return 1-i.reduce(function(t,e,i){var a=r[i],n=e[1]-a[1];return t+n*n},0)/n}function a(t,e){var r=Math.pow(10,e);return Math.round(t*r)/r}var n={linear:function(t,e){for(var r=[0,0,0,0,0],n=0,o=0;o<t.length;o++)null!==t[o][1]&&(n++,r[0]+=t[o][0],r[1]+=t[o][1],r[2]+=t[o][0]*t[o][0],r[3]+=t[o][0]*t[o][1],r[4]+=t[o][1]*t[o][1]);var s=n*r[2]-r[0]*r[0],u=n*r[3]-r[0]*r[1],p=0===s?0:a(u/s,e.precision),c=a(r[1]/n-p*r[0]/n,e.precision),l=function(t){return[a(t,e.precision),a(p*t+c,e.precision)]},h=t.map(function(t){return l(t[0])});return{points:h,predict:l,equation:[p,c],r2:a(i(t,h),e.precision),string:0===c?"y = "+p+"x":"y = "+p+"x + "+c}},exponential:function(t,e){for(var r=[0,0,0,0,0,0],n=0;n<t.length;n++)null!==t[n][1]&&(r[0]+=t[n][0],r[1]+=t[n][1],r[2]+=t[n][0]*t[n][0]*t[n][1],r[3]+=t[n][1]*Math.log(t[n][1]),r[4]+=t[n][0]*t[n][1]*Math.log(t[n][1]),r[5]+=t[n][0]*t[n][1]);var o=r[1]*r[2]-r[5]*r[5],s=Math.exp((r[2]*r[3]-r[5]*r[4])/o),u=(r[1]*r[4]-r[5]*r[3])/o,p=a(s,e.precision),c=a(u,e.precision),l=function(t){return[a(t,e.precision),a(p*Math.exp(c*t),e.precision)]},h=t.map(function(t){return l(t[0])});return{points:h,predict:l,equation:[p,c],string:"y = "+p+"e^("+c+"x)",r2:a(i(t,h),e.precision)}},logarithmic:function(t,e){for(var r=[0,0,0,0],n=t.length,o=0;o<n;o++)null!==t[o][1]&&(r[0]+=Math.log(t[o][0]),r[1]+=t[o][1]*Math.log(t[o][0]),r[2]+=t[o][1],r[3]+=Math.pow(Math.log(t[o][0]),2));var s=a((n*r[1]-r[2]*r[0])/(n*r[3]-r[0]*r[0]),e.precision),u=a((r[2]-s*r[0])/n,e.precision),p=function(t){return[a(t,e.precision),a(a(u+s*Math.log(t),e.precision),e.precision)]},c=t.map(function(t){return p(t[0])});return{points:c,predict:p,equation:[u,s],string:"y = "+u+" + "+s+" ln(x)",r2:a(i(t,c),e.precision)}},power:function(t,e){for(var r=[0,0,0,0,0],n=t.length,o=0;o<n;o++)null!==t[o][1]&&(r[0]+=Math.log(t[o][0]),r[1]+=Math.log(t[o][1])*Math.log(t[o][0]),r[2]+=Math.log(t[o][1]),r[3]+=Math.pow(Math.log(t[o][0]),2));var s=(n*r[1]-r[0]*r[2])/(n*r[3]-Math.pow(r[0],2)),u=(r[2]-s*r[0])/n,p=a(Math.exp(u),e.precision),c=a(s,e.precision),l=function(t){return[a(t,e.precision),a(a(p*Math.pow(t,c),e.precision),e.precision)]},h=t.map(function(t){return l(t[0])});return{points:h,predict:l,equation:[p,c],string:"y = "+p+"x^"+c,r2:a(i(t,h),e.precision)}},polynomial:function(t,e){for(var r=[],n=[],o=0,s=0,u=t.length,p=e.order+1,c=0;c<p;c++){for(var l=0;l<u;l++)null!==t[l][1]&&(o+=Math.pow(t[l][0],c)*t[l][1]);r.push(o),o=0;for(var h=[],d=0;d<p;d++){for(var f=0;f<u;f++)null!==t[f][1]&&(s+=Math.pow(t[f][0],c+d));h.push(s),s=0}n.push(h)}n.push(r);for(var v=function(t,e){for(var r=t,i=t.length-1,a=[e],n=0;n<i;n++){for(var o=n,s=n+1;s<i;s++)Math.abs(r[n][s])>Math.abs(r[n][o])&&(o=s);for(var u=n;u<i+1;u++){var p=r[u][n];r[u][n]=r[u][o],r[u][o]=p}for(var c=n+1;c<i;c++)for(var l=i;l>=n;l--)r[l][c]-=r[l][n]*r[n][c]/r[n][n]}for(var h=i-1;h>=0;h--){for(var d=0,f=h+1;f<i;f++)d+=r[f][h]*a[f];a[h]=(r[i][h]-d)/r[h][h]}return a}(n,p).map(function(t){return a(t,e.precision)}),g=function(t){return[a(t,e.precision),a(v.reduce(function(e,r,i){return e+r*Math.pow(t,i)},0),e.precision)]},y=t.map(function(t){return g(t[0])}),_="y = ",m=v.length-1;m>=0;m--)_+=m>1?v[m]+"x^"+m+" + ":1===m?v[m]+"x + ":v[m];return{string:_,points:y,predict:g,equation:[].concat(function(t){if(Array.isArray(t)){for(var e=0,r=Array(t.length);e<t.length;e++)r[e]=t[e];return r}return Array.from(t)}(v)).reverse(),r2:a(i(t,y),e.precision)}}};t.exports=Object.keys(n).reduce(function(t,i){return e({_round:a},t,function(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}({},i,function(t,a){return n[i](t,e({},r,a))}))},{})})},oUDf:function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i={};r.d(i,"Regression",function(){return l});var a=r("m4/l"),n=r("1NAr"),o=r("Iz1H"),s=r("aCit"),u=r("o0Lc"),p=r("Qkdp"),c=r("Mtpk"),l=function(t){function e(){var e=t.call(this)||this;return e.events=new u.a,e._method="linear",e._options={},e._simplify=!1,e._reorder=!1,e._originalDataHash="",e._skipValidatedEvent=!1,e}return Object(a.c)(e,t),e.prototype.init=function(){t.prototype.init.call(this),this.processSeries()},e.prototype.processSeries=function(){var t=this;this.invalidateData(),this._disposers.push(this.target.events.on("beforedatavalidated",function(e){t._skipValidatedEvent?t._skipValidatedEvent=!1:(t.saveOriginalData(),t.calcData())})),this.target.chart&&this._disposers.push(this.target.chart.events.on("beforedatavalidated",function(e){t.target.invalidateData()})),this.target.adapter.add("data",function(){return void 0===t._data&&t.calcData(),t._data}),this.saveOriginalData()},e.prototype.saveOriginalData=function(){this.target.adapter.disableKey("data"),this.target.data&&this.target.data.length&&(this._originalData=this.target.data),this.target.adapter.enableKey("data")},e.prototype.invalidateData=function(){this._data=void 0},e.prototype.calcData=function(){this._data=[];var t=this.target,e=this._originalData;e&&0!=e.length||(e=this.target.baseSprite.data);for(var r=!(!t.dataFields.valueX||t.dataFields.valueY),i=r?t.dataFields.valueX:t.dataFields.valueY,a=r?t.dataFields.valueY:t.dataFields.valueX,o=[],s=function(t){var r={};p.each(u.target.dataFields,function(i,a){r[a]=e[t][a]}),c.hasValue(r[i])&&o.push(r)},u=this,l=0;l<e.length;l++)s(l);this.reorder&&o.sort(function(t,e){return t[a]>e[a]?1:t[a]<e[a]?-1:0});var h=[];for(l=0;l<o.length;l++){var d=t.dataFields.valueX&&r?o[l][t.dataFields.valueX]:l,f=t.dataFields.valueY&&!r?o[l][t.dataFields.valueY]:l;h.push(r?[f,d]:[d,f])}var v=[];switch(this.method){case"polynomial":v=n.polynomial(h,this.options);break;default:v=n.linear(h,this.options)}this.result=v;var g=btoa(JSON.stringify(o));g!=this._originalDataHash&&this.events.dispatchImmediately("processed",{type:"processed",target:this}),this._originalDataHash=g,this._data=[];var y,_=function(t){m.simplify&&t&&(t=v.points.length-1);var e={};p.each(m.target.dataFields,function(i,a){e[a]="valueY"==i&&!r||"valueX"==i&&r?v.points[t][1]:o[t][a]}),m._data.push(e),y=t},m=this;for(l=0;l<v.points.length;l++)_(l),l=y},Object.defineProperty(e.prototype,"method",{get:function(){return this._method},set:function(t){this._method!=t&&(this._method=t,this.invalidateData())},enumerable:!0,configurable:!0}),Object.defineProperty(e.prototype,"options",{get:function(){return this._options},set:function(t){this._options!=t&&(this._options=t,this.invalidateData())},enumerable:!0,configurable:!0}),Object.defineProperty(e.prototype,"simplify",{get:function(){return this._simplify},set:function(t){this._simplify!=t&&(this._simplify=t,this.invalidateData())},enumerable:!0,configurable:!0}),Object.defineProperty(e.prototype,"reorder",{get:function(){return this._reorder},set:function(t){this._reorder!=t&&(this._reorder=t,this.invalidateData())},enumerable:!0,configurable:!0}),e}(o.a);s.c.registeredClasses.Regression=l,window.am4plugins_regression=i}},["oUDf"]);
//# sourceMappingURL=regression.js.map