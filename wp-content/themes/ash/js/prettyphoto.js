$(document).ready(function() {
	
	$("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'light_rounded'});
	
	$(".more-option").click(function() {
  		$(this).parent().find('.list7 li').removeClass('hide');
			$(this).hide();
			return false;
	});
	
});
