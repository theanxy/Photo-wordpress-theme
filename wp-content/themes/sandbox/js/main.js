var WZ = {
	onReady : function() {
		$('html').removeClass('no-js').addClass('js');
		
		WZ.hideImages();
		
		if(WZ.detectHistory()) {
			WZ.setupHistory();
			
			window.addEventListener("popstate", function(e) {
				var linkHref = location.pathname.split("/"),
					linkHrefId = linkHref[linkHref.length-2];
				WZ.swapPhoto(linkHrefId);
			}, false);
		};
	},
	
	hideImages : function() {
		if(!$('.photos article.active').length) {
			$('.photos article:eq(0)').addClass('active');
		}
	},
	
	// implementing History API
	detectHistory : function() {
		return !!(window.history && history.pushState);
	},
	setupHistory : function() {
		var pathName = location.pathname,
			pathNameSliced = pathName.split('/');
		
		if(pathNameSliced.length > 3) {
			var pathName = '/'+pathNameSliced[1]+'/',
			 	singlePhoto = true;
		};
		
		WZ.addClicker($('#photos-nav a[rel=prev]'), pathName, singlePhoto);
		WZ.addClicker($('#photos-nav a[rel=next]'), pathName, singlePhoto);
	},
	
	addClicker : function(link, pathName, singlePhoto) {
		link.click(function(e) {
			
			var $this = $(this),
				$counter = $('#photos-nav meter'),
				change = $this.attr('rel') == 'next' ? 1 : -1,
				linkHref = link.attr('href').split("/");
				linkHrefId = linkHref[linkHref.length-2];

			console.log('linkHrefId '+linkHrefId);
			WZ.swapPhoto(linkHrefId);
			history.pushState(null, null, pathName+linkHrefId+'/');

			// changing photos index
			var currentIndex = $counter.html(),
			 	newIndex = eval(currentIndex) + change;

			$counter.html(newIndex);
			WZ.updatePhotoNav();
			
			e.preventDefault();
		});
	},
	
	// updating Photo Navigation after change
	updatePhotoNav : function() {
		var $counter = $('#photos-nav meter'),
			$prevLink = $('#photos-nav a[rel=prev]'),
			$nextLink = $('#photos-nav a[rel=next]'),
 			index = eval($counter.html()),
		 	maxIndex = $counter.attr('max');

			// setting previous photo link
			if(index == 1) {
				$prevLink.removeAttr('href');
			} else {
				prevVal = index - 1;
				$prevLink.attr('href', prevVal + '/');
			};
			
			// setting next photo link
			if(index == maxIndex) {
				$nextLink.removeAttr('href');
			} else {
				nextVal = index + 1;
				$nextLink.attr('href', nextVal + '/');
			};
	},
	
	// swaps given photos
	swapPhoto : function(destination) {
		console.log('destination: ' + destination);
/*		var newIndex = destination.split("/").pop();
		newIndex.length == 4 ? newIndex = newIndex[2] : console.log('bląd');*/
		
		// making new photo active
		$('.photos .active').fadeOut('fast', function() {
			$(this).removeClass('active');
			$('.photos article').eq(destination-1).fadeIn('fast').addClass('active');
		});
	}
};

$(document).ready(WZ.onReady);