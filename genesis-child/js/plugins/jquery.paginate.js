!function(e){e.fn.pajinate=function(a){var i,n,l,s,t,_,r="current_page",d="items_per_page",c=(a=e.extend({item_container_id:".content",items_per_page:10,nav_panel_id:".page_navigation",nav_info_id:".info_text",num_page_links_to_display:20,start_page:0,wrap_around:!1,nav_label_first:"First",nav_label_prev:"Prev",nav_label_next:"Next",nav_label_last:"Last",nav_order:["first","prev","num","next","last"],nav_label_info:"Showing {0}-{1} of {2} results",show_first_last:!0,abort_on_small_lists:!1,jquery_ui:!1,jquery_ui_active:"ui-state-highlight",jquery_ui_default:"ui-state-default",jquery_ui_disabled:"ui-state-disabled"},a)).jquery_ui?a.jquery_ui_default:"",p=a.jquery_ui?a.jquery_ui_active:"",o=a.jquery_ui?a.jquery_ui_disabled:"";return this.each(function(){if(l=e(this),n=e(this).find(a.item_container_id),s=l.find(a.item_container_id).children(),a.abort_on_small_lists&&a.items_per_page>=s.size())return l;(i=l).data(r,0),i.data(d,a.items_per_page);for(var o=n.children().length,v=Math.ceil(o/a.items_per_page),k=a.show_first_last?'<li class="page-item first_link '+c+'"><a class="page-link" href="#">'+a.nav_label_first+"</a></li>":"",m=a.show_first_last?'<li class="page-item last_link '+c+'"><a class="page-link" href="#">'+a.nav_label_last+"</a></li>":"",b="",y=0;y<a.nav_order.length;y++)switch(a.nav_order[y]){case"first":b+=k;break;case"last":b+=m;break;case"next":b+='<li class="page-item next_link '+c+'"><a class="page-link" href="#">'+a.nav_label_next+"</a></li>";break;case"prev":b+='<li class="page-item previous_link '+c+'"><a class="page-link" href="#">'+a.nav_label_prev+"</a></li>";break;case"num":b+='<li class="page-item disabled ellipse less"><a class="page-link" href="#">...</a></li>';for(var w=0;v>w;)b+='<li class="page-item page_link '+c+'" longdesc="'+w+'"><a class="page-link" href="#">'+(w+1)+"</a></li>",w++;b+='<li class="page-item disabled ellipse more"><a class="page-link" href="#">...</a></li>'}(t=l.find(a.nav_panel_id)).html(b).each(function(){e(this).find(".page_link:first").addClass("first"),e(this).find(".page_link:last").addClass("last")}),t.children(".ellipse").hide(),t.find(".previous_link").next().next().addClass("active "+p),s.hide(),s.slice(0,i.data(d)).show(),_=l.find(a.nav_panel_id+":first").children(".page_link").length,a.num_page_links_to_display=Math.min(a.num_page_links_to_display,_),t.children(".page_link").hide(),t.each(function(){e(this).children(".page_link").slice(0,a.num_page_links_to_display).show()}),l.find(".first_link").click(function(a){a.preventDefault(),h(e(this),0),f(0)}),l.find(".last_link").click(function(a){a.preventDefault();var i=_-1;g(e(this),i),f(i)}),l.find(".previous_link").click(function(n){n.preventDefault(),function(n){new_page=parseInt(i.data(r))-1,1==e(n).siblings(".active").prev(".page_link").length?(h(n,new_page),f(new_page)):a.wrap_around&&f(_-1)}(e(this))}),l.find(".next_link").click(function(n){n.preventDefault(),function(n){new_page=parseInt(i.data(r))+1,1==e(n).siblings(".active").next(".page_link").length?(g(n,new_page),f(new_page)):a.wrap_around&&f(0)}(e(this))}),l.find(".page_link").click(function(a){a.preventDefault(),f(e(this).attr("longdesc"))}),f(parseInt(a.start_page)),a.wrap_around||u()});function f(e){e=parseInt(e,10);var t=parseInt(i.data(d));start_from=e*t,end_on=start_from+t;var _=s.hide().slice(start_from,end_on);_.fadeIn(700),l.find(a.nav_panel_id).children(".page_link[longdesc="+e+"]").addClass("active "+p).siblings(".active").removeClass("active "+p),i.data(r,e);var c=parseInt(i.data(r)+1),o=n.children().length,f=Math.ceil(o/a.items_per_page);l.find(a.nav_info_id).html(a.nav_label_info.replace("{0}",start_from+1).replace("{1}",start_from+_.length).replace("{2}",s.length).replace("{3}",c).replace("{4}",f)),u(),void 0!==a.onPageDisplayed&&a.onPageDisplayed.call(this,e+1)}function g(i,n){var l=n;"none"==e(i).siblings(".active").siblings(".page_link[longdesc="+l+"]").css("display")&&t.each(function(){e(this).children(".page_link").hide().slice(parseInt(l-a.num_page_links_to_display+1),l+1).show()})}function h(i,n){var l=n;"none"==e(i).siblings(".active").siblings(".page_link[longdesc="+l+"]").css("display")&&t.each(function(){e(this).children(".page_link").hide().slice(l,l+parseInt(a.num_page_links_to_display)).show()})}function u(){t.children(".last").hasClass("active")?t.children(".next_link").add(".last_link").addClass("no_more "+o):t.children(".next_link").add(".last_link").removeClass("no_more "+o),t.children(".first").hasClass("active")?t.children(".previous_link").add(".first_link").addClass("no_more "+o):t.children(".previous_link").add(".first_link").removeClass("no_more "+o)}}}(jQuery);