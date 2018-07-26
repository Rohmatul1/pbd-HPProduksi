jQuery(document).ready(function(){
	/* Ajax Section */
	var jQForm = jQuery('#live-search-form');
	var isAjaxFired = 0;
	var homeLink = jQForm.data('url');
	jQForm.find('input').keyup(function(){
		var that = jQuery(this);
		var data = {
			'action':'get_knowledgebase',
			'sent':jQuery(this).val()
		};
		if(that.val().length > 0){
			jQuery.ajax({
				url:homeLink+'/wp-admin/admin-ajax.php',
				data: data,
				method: 'POST',
				beforeSend:function(){
					jQuery('.live-search-loading').show();
				},
				success:function(response){
					if(that.val().length > 0){
						jQuery('#searchAble').show().empty().prepend(response);
						isAjaxFired = 1;
					}
					else{
						jQuery('#searchAble').hide();
					}
				}
			}).done(function(){
				jQuery('.live-search-loading').hide();
			});
		}
		else{
			jQuery('#searchAble').hide();
		}
	});
	
	var maxHeight = 0;
	$('.feature-box.fbox-plain').each(function(){
		var thisheight = $(this).parents('.col-md-4').height();
		if(maxHeight < thisheight){
			maxHeight = thisheight;
		}
	});
	$('.feature-box.fbox-plain').parents('.col-md-4').height(maxHeight);
	
	
	$.fn.extend({
		animateCss: function (animationName) {
			var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
			var that = $(this);
			$(this).addClass('animated ' + animationName).on(animationEnd, function() {
				$(this).removeClass('animated ' + animationName, function(){
					that.addClass('animated ' + animationName);
				});
			});
		}
	});
	
	$('#cobasekarang a').animateCss('tada');
	
	var trialformuname = '',
		trialformemail = '',
		trialformaction = "https://my.beecloud.id/ecommerce/site/trial?product_id=8&email="+trialformemail+"&username="+trialformuname;
		
	$('#test-trial-form').attr('action', trialformaction);
		
	$('#test-trial-form .username').keyup(function(){
		trialformuname = $(this).val();
		trialformaction = "https://my.beecloud.id/ecommerce/site/trial?product_id=8&email="+trialformemail+"&username="+trialformuname;
		formid.attr('action', trialformaction);
	});
	
	$('#test-trial-form .email').keyup(function(){
		trialformemail = $(this).val();
		trialformaction = "https://my.beecloud.id/ecommerce/site/trial?product_id=8&email="+trialformemail+"&username="+trialformuname;
		formid.attr('action', trialformaction);
	});
	
	var heightmax = 0;
	$('.sameheightready').each(function(){
		if($(this).height() > heightmax)
			heightmax = $(this).height();
	});
	
	$('.sameheightready').height(heightmax);
	
	var documentheight = $(document).height();
	var mustshowat = (documentheight/2)-300;
	jQuery(window).scroll(function(){
		var $window = jQuery(window);
		console.log(documentheight);
		if($window.scrollTop() > mustshowat) {
			$('#seealsocontainer').css('right','-1px');
		} else {
			$('#seealsocontainer').css('right','-360px');
		}
	});
	
	$('#seealsocontainer .closebutton').click(function(){
		$(this).parent('#seealsocontainer').remove();
	});
	
	$('[data-toggle="tooltip"]').tooltip();
	
});

jQuery(window).load(function(){
	var heightmax = 0;
	$('.sameheight').each(function(){
		if($(this).height() > heightmax)
			heightmax = $(this).height();
	});
	
	$('.sameheight').height(heightmax);
	
});
