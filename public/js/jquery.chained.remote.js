/*! Chained 2.0.0-beta.3 - MIT license - Copyright 2010-2017 Mika Tuupola */
!function(a,b,c,d){"use strict";a.fn.remoteChained=function(b){var c=a.extend({},a.fn.remoteChained.defaults,b);return c.loading&&(c.clear=!0),this.each(function(){function b(b){var c=a(":selected",d).val();a("option",d).remove(),a.isArray(b)?a.each(b,function(b,e){a.each(e,function(b,e){if("selected"===b)c=e;else{var f=a("<option />").val(b).append(e);a(d).append(f)}})}):a.each(b,function(e,f){if(b.hasOwnProperty(e))if("selected"===e)c=f;else{var g=a("<option />").val(e).append(f);a(d).append(g)}}),a(d).children().each(function(){a(this).val()===c+""&&a(this).attr("selected","selected")}),1===a("option",d).length&&""===a(d).val()?a(d).prop("disabled",!0):a(d).prop("disabled",!1)}var d=this,e=!1;a(c.parents).each(function(){a(this).bind("change",function(){var f={};a(c.parents).each(function(){var b=a(this).attr(c.attribute),e=(a(this).is("select")?a(":selected",this):a(this)).val();f[b]=e,c.depends&&a(c.depends).each(function(){if(d!==this){var b=a(this).attr(c.attribute),e=a(this).val();f[b]=e}})}),e&&a.isFunction(e.abort)&&(e.abort(),e=!1),c.clear&&(c.loading?b.call(d,{"":c.loading}):a("option",d).remove(),a(d).trigger("change")),e=a.getJSON(c.url,f,function(e){e=c.data(e),b.call(d,e),a(d).trigger("change")})}),c.bootstrap&&(b.call(d,c.bootstrap),c.bootstrap=null)})})},a.fn.remoteChainedTo=a.fn.remoteChained,a.fn.remoteChained.defaults={attribute:"name",depends:null,bootstrap:null,loading:null,clear:!1,data:function(a){return a}}}(window.jQuery||window.Zepto,window,document);