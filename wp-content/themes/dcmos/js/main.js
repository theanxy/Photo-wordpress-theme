/*******************************************************************************

	CSS on Sails Framework
	Title: Compete - DCMOS
	Author: XHTMLized (http://www.xhtmlized.com/)
	Date: January 2011

*******************************************************************************/

$(document).ready(function() {
	DE.init();
	if($('#may5-golf').attr('checked')) {
		$('#options-golf').addClass('show');
	}
	$('.may5 input').click(function(){
		if($('#may5-golf').attr('checked')) {
			$('#options-golf').addClass('show');
		} else {
			$('#options-golf').removeClass('show');
		}
	});
	
	$('.twitter-feed a').text(function(i, text){
		if(text.length > 25){
			text = text.substr(0, 25) + '…'; 
		};
		return text; 
	});
});

var DE = {
	init: function(){
		DE.videosLightBox();
	},
	
	videosLightBox: function(){
		var vids = $('.videos a');
		if(vids.size()){
			vids.colorbox({
				title: function(){
					var el = $.colorbox.element();
					return el.next().text();
				},
				href: function(){
					var href = $.colorbox.element().attr('href');
					var id = href.substring(href.lastIndexOf('/')+1);
					return 'http://www.youtube.com/embed/'+id;
				},
				iframe: true,
				innerWidth: 640,
				innerHeight: 390,
				opacity: 0.7,
				current: "video {current} of {total}"
			});
		}
	}
}