$(window).ready(function() {  

	"use strict";
	
	$(".skills").each(function() {		
		$(this).appear(function() { 
		

			$('.skill-1').goalProgress({
				goalAmount: 100,
				currentAmount: 95
			});
			
			$('.skill-2').goalProgress({
				goalAmount: 100,
				currentAmount: 89
			});
			
			$('.skill-3').goalProgress({
				goalAmount: 100,
				currentAmount: 87
			});
					
			$('.skill-4').goalProgress({
				goalAmount: 100,
				currentAmount: 92
			});
						
			
		});
	});
	
});