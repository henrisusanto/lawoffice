jQuery(document).ready(function(){

	jQuery(window).resize(function () {
		SubMenuLeftOffset();
	});

	var THEMEREX_custom_menu_placeholder = '';
	var THEMEREX_custom_menu_holderItem = '';
	jQuery('.menu-panel ul.sub-menu li a').hover(
		function(){
			if (!jQuery(this).parents('.menu-panel').hasClass('columns')) {
				var title = jQuery(this).data('title'),
					href = jQuery(this).data('link'),
					thumb = jQuery(this).data('thumb'),
					author = jQuery(this).data('author'),
					pubdate = jQuery(this).data('pubdate'),
					comments = jQuery(this).data('comments'),
					holderParent = jQuery(this).parents('ul').next();
				if (holderParent) {
					THEMEREX_custom_menu_placeholder = holderParent.html();
					THEMEREX_custom_menu_holderItem  = holderParent;
					holderParent.find('img').attr('src', thumb);
					holderParent.find('.item_title a').text(title).attr('href', href);
					holderParent.find('.item_pubdate em').text(pubdate);
					holderParent.find('.item_comments em').text(comments);
					holderParent.find('.item_author em').text(author);
				}
			}
		},
		function() {

		}
	);

	SubMenuLeftOffset();
});

function parentCheck(th, divName) {
	thType = th.get(0).tagName.toLowerCase();
	if (divName != '' && thType == 'li') {
		if (th.find(divName).length > 0) {
			return th.find(divName);
		} else {
			return parentCheck(th.parent().parent(), divName);
		}
	}
}

/* Find sub-menu left offset and move it left on 'offest'px*/
function SubMenuLeftOffset(){
	if (jQuery('#mainmenu').length > 0) {

		if (jQuery('body').hasClass('responsive_menu')) {
			return;
		}

		var th = jQuery('#mainmenu').find('li.custom_view_item');
		if ( th.length == 0 ) return;

		if (th.offset().left == 0) {
			setTimeout(function() {
				SubMenuLeftOffset();
			},500);
			return;
		} else if (th.offset().left != 0) {
			var panel = th.find('.menu-panel');
			var mainW = jQuery('.main').width();
			var contOffset = (jQuery(window).width() - mainW) / 2;
			var submenuOffset;
			var smLeft;
			panel.css('width', mainW + 100);
			panel.find('ul.columns').css('max-width', mainW + 100);
			th.each(function(){
				submenuOffset = jQuery(this).offset().left;
				smLeft = Math.abs(contOffset - submenuOffset - 50);
				panel = jQuery(this).find('.menu-panel');
				panel.css('left', '-' + smLeft.toString() + 'px');
			});

		}
	}
}