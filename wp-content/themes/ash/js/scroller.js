$(document).ready(function() {
		$(".tour-the-center .inner").jCarouselLite({
	    btnNext: ".tour-the-center a.next-btn",
	    btnPrev: ".tour-the-center a.previous-btn",
	    visible: 4,
			circular: false
	});
	
	$(".media-press .inner").jCarouselLite({
	    btnNext: ".media-press a.next-btn",
	    btnPrev: ".media-press a.previous-btn",
	    visible: 3,
			circular: false
	});
	
	$(".team .inner").jCarouselLite({
	    btnNext: ".team a.next-btn",
	    btnPrev: ".team a.previous-btn",
	    visible: 3,
			circular: false
	});
});
