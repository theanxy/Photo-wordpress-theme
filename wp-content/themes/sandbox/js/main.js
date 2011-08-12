var WZ = {
	onReady : function() {
		$('html').removeClass('no-js').addClass('js');
		
		WZ.hideImages();
		
		if(Modernizr.history) {
			WZ.setupHistory();
		};
		
		$('.photos img').click(function(){
			/*var url = location.pathname.split('/');
			var newId = url.length > 3 ? eval(url[url.length-2]) : 1;
			console.log(newId + 1);
			WZ.swapPhoto(newId + 1);*/
			$('#photos-nav a[rel=next]').click();
		})
	},
	
	hideImages : function() {
		if(!$('.photos figure.active').length) {
			$('.photos figure:eq(0)').addClass('active');
		}
	},
	
	// implementing History API
	setupHistory : function() {
		var pathName = location.pathname,
			pathNameSliced = pathName.split('/');
		
		if(pathNameSliced.length > 3) {
			var pathName = '/'+pathNameSliced[1]+'/',
			 	singlePhoto = true;
		};
		
		WZ.addClicker($('#photos-nav a[rel=prev]'), pathName, singlePhoto);
		WZ.addClicker($('#photos-nav a[rel=next]'), pathName, singlePhoto);
		
		window.addEventListener("popstate", function(e) {
			var linkHref = location.pathname.split("/"),
				linkHrefId = linkHref.length > 3 ? linkHref[linkHref.length-2] : 1;

			WZ.swapPhoto(linkHrefId);
			WZ.updatePhotoNav(eval(linkHrefId));
			
		}, false);
	},
	
	addClicker : function(link, pathName, singlePhoto) {
		link.click(function(e) {
			if(link.attr('href') != undefined) {
				var $this = $(this),
					$counter = $('#photos-nav meter'),
					change = $this.attr('rel') == 'next' ? 1 : -1,
					linkHref = link.attr('href').split("/"),
					isSecond = linkHref.length > 3 ? true : false,
					linkHrefId = !isSecond ? '' : linkHref[linkHref.length-2],
					slash = !isSecond ? '' : '/';

				history.pushState(null, null, pathName+linkHrefId+slash);
				var updatedPhoto = linkHrefId == '' ? 1 : linkHrefId;
				WZ.swapPhoto(updatedPhoto);

				// changing photos index
				var currentIndex = $counter.html(),
				 	newIndex = eval(currentIndex) + change;

				WZ.updatePhotoNav(eval(newIndex));
			};
			
			e.preventDefault();
		});
	},
	
	// swaps given photos
	swapPhoto : function(destination) {
		// making new photo active
		$('.photos .active').fadeOut('fast', function() {
			$(this).removeClass('active');
			$('.photos figure').eq(destination-1).fadeIn('fast').addClass('active');
		});
	},
	
	// updating Photo Navigation after change
	updatePhotoNav : function(newIndex) {
		var $counter = $('#photos-nav meter'),
			$prevLink = $('#photos-nav a[rel=prev]'),
			$nextLink = $('#photos-nav a[rel=next]'),
 			index = eval($counter.html()),
		 	maxIndex = $counter.attr('max'),
			oldPath = location.pathname.split("/"),
			newPath = '/' + oldPath[1] + '/';

			// updating current count
			$counter.html(newIndex);
			
			// setting previous photo link
			if(newIndex == 1) {
				$prevLink.removeAttr('href');
			} else if(newIndex == 2) {
				$prevLink.attr('href', newPath);
			} else {
				prevVal = newIndex - 1;
				$prevLink.attr('href', newPath + prevVal + '/');
			};
			
			// setting next photo link
			if(newIndex == maxIndex) {
				$nextLink.removeAttr('href');
			} else {
				nextVal = newIndex + 1;
				$nextLink.attr('href', newPath + nextVal + '/');
			};
	}
};

$(document).ready(WZ.onReady);