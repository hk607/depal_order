$(window).scroll(function(){
	if ($(this).scrollTop() > 100) {
		$('#scroll').fadeIn();
	} else {
		$('#scroll').fadeOut();
	}
});
$('#scroll').click(function(){
	$("html, body").animate({ scrollTop: 0 }, 1500);
	return false;
});