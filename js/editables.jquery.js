
(function($) {
    $.fn.editables = function(options) {       	
		var settings = $.extend({
            itemWidth : 200			
        }, options);
		triggerBtn = $(this).find('.editIt');
		
		return triggerBtn.each( function() {	
		
				
			$(this).click(function(){
				idval = $(this).data('toggle');				
				$(this).parent().toggleClass('hide');
				triggerRemove = $(this).parent().next().find('.cancelEdits');
				triggerRemove.parents().find('.toggled').parent().children('.headBlock').toggleClass('hide');
				triggerRemove.parents().find('.toggled').toggle();
				triggerRemove.parents().find('.toggled').toggleClass('toggled');
					
					
				$(this).parent().next().toggle();
				$(this).parent().next().toggleClass('toggled');
				
				triggerRemove.click(function(){
					$(this).parents().find('.toggled').parent().children('.headBlock').toggleClass('hide');
					$(this).parents().find('.toggled').toggle();
					$(this).parents().find('.toggled').toggleClass('toggled');
					});
				
				});
				
        });
		
    }
}(jQuery));


