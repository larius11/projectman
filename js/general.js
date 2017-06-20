$(document).ready(function(){
	$("a.mobile").click(function(){
		$(".sidebar").slideToggle('fast');
	});

	window.onresize = function(event) {
		if($(window).width() > 620){
			$(".sidebar").show();
		}
	};
});