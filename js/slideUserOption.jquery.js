(function($) {
    $.fn.sliderUserOption = function(options) {       	
		var settings = $.extend({
            itemWidth : 200,
			mainWidth : '100%',
			effect    : 'fadeRemove'
        }, options);
		
		return this.each( function() {
			var externalId = $(this).children();			
			var elementCount = externalId.children().length;	    
			var elementWidth =  settings.itemWidth + 30;
			$(this).css('width', settings.mainWidth);
			$(this).css('overflow', 'hidden');			
			externalId.css("width", elementCount*elementWidth+"px" );		
				externalId.children().each(function(){					
					var parentEle = $(this); 
					var skipObj = parentEle.find('.skip');
					skipObj.click(function(){
						//If FadeRemove Effect
						if(settings.effect == 'fadeRemove'){
							parentEle.animate({
								marginLeft: '-'+settings.itemWidth,
								opacity: 0
							}, 400, function(){
									parentEle.remove();
							});
						}
						
					});
					
					
			   });
        });
    }
}(jQuery));
