$(document).ready(function() {
	//JS Code Secific to Home Page Goes Here
	$('#slideshow .slides').cycle({
				slideExpr: ' .slide',
				cleartypeNoBg: ' true' ,
				fx: 'fade',
				timeout: 5000, 
				pager:  '#nav', 
				pagerAnchorBuilder: function(idx, slide) { 
						// return selector string for existing anchor 
						return '#nav li:eq(' + idx + ') a'; 
				} 
		});
		
		$("#footer .first-visitor h2").click(function() {
				$('#footer .first-visitor .inner').slideToggle();
				return false;
		});
});
