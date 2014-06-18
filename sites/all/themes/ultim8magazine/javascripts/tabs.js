
(function ($) {
	$(document).ready(function() {

		//When page loads...
		$(".tabs-content li.tabli").hide(); //Hide all content
		$("ul.tabss li.tabli:first").addClass("active").show(); //Activate first tab
		$(".tabs-content li.tabli:first").show(); //Show first tab content

		//On Click Event
		$("ul.tabss li").click(function() {

			$("ul.tabss li.tabli").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(".tabs-content li.tabli").hide(); //Hide all tab content

			var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		});

	});
})(jQuery);