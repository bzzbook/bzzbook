(function($) {
	
	function pagephotobox(opts) {
		
		this.settings = $.extend({}, $.fn.pagephotobox.defaults, opts);
		this.bodyDimension = {width:0,height:0};
		this.bodyDimension.width = $('body').width();
		this.bodyDimension.height = $('body').height();
		this.container = $("." + this.settings.containerClassName);
		this.IsDisplayed = false;
		this.animateVelocity = 3;
		this.init();
	}
	
	pagephotobox.prototype = {
		init: function() {
			
			var $this = this;
			this.initDOM();
			this.initSettings();
			this.rightArrow = $(".right-arrow");
			this.leftArrow = $(".left-arrow");
			this.fbpMainImage = $(".pagephotobox-main-image");
			this.fbpMainContainer = $(".pagephotobox-main-container");
			this.fbpOverlay = $(".pagephotobox-overlay");
			this.lazyLoadImage = new Image();
			this.lazyLoadImage.onload = function() { $this.refreshBoxSize(this); };
			this.fbpMainImage.bind("onFbBoxImageShow", this.settings.onImageShow);
			
			// Prev & Next btn hover animation
			$(".pagephotobox-a").hover(function() {
				$(this).fadeTo("fast", 1);
			}, function() {
				$(this).fadeTo("fast", 0.5);
			});
			
			// pagephotobox stage close
			$(".pagephotobox-close-btn a").click(function() {
				$this.hide();
				return false;
			});
			$(".pagephotobox-overlay").click(function() {
				$this.hide();
				return false;
			});
			
			// Left side overlay hover animation
			$(".pagephotobox-container-left").hover(function() {
				$(".pagephotobox-image-stage-overlay").fadeIn($this.settings.imageOverlayFadeSpeed);
			}, function() {
				$(".pagephotobox-image-stage-overlay").fadeOut($this.settings.imageOverlayFadeSpeed);
			});
			
			// Setup click trigger
			$('.' + this.settings.containerClassName).on("click", "." + this.settings.imageClassName, function() {
				
				$this.show($(this));
			});
			
			// Handle left right click event
			this.leftArrow.click(function() {
				var prevIndex = $this.leftArrow.attr("data-prev-index");
				
				var indexArr = prevIndex.split('#');
				
				/*var image = $('.' + $this.settings.containerClassName + ' .' + $this.settings.imageClassName).get($this.leftArrow.attr("data-prev-index"));*/
				var image = $('#' + indexArr[0]+" .photo").get(indexArr[1]);
				if (image) $this.show($(image));
			});
			this.rightArrow.click(function() {
				var nextIndex = $this.rightArrow.attr("data-next-index");
				
				var indexArr = nextIndex.split('#');
				
				/*var image = $('.' + $this.settings.containerClassName + ' .' + $this.settings.imageClassName).get($this.rightArrow.attr("data-next-index"));*/
				var image = $('#' + indexArr[0]+" .photo").get(indexArr[1]);
				if (image) $this.show($(image));
			});
			
			// Start of FullScreen Mode Binding //
			$(".pagephotobox-fc-btn").click(function() {
				$this.fullScreenMode = true;
				$this.showFullScreen($this.mainImage);
				return false;
			});
			$(".fc-left-arrow .pagephotobox-a").click(function() {
				$this.leftArrow.click();
				$this.showFullScreen($this.mainImage);
			});
			$(".fc-right-arrow .pagephotobox-a").click(function() {
				$this.rightArrow.click();
				$this.showFullScreen($this.mainImage);
			});
			$(".pagephotobox-fc-close-btn").click(function() {
				$this.fullScreenMode = false;
				$this.hideFullScreen();
				return false;
			});
			
			// Bind the window resize callback
			$(window).resize(function() {
				$this.refreshBoxSize();
			});
		},
		show: function(image) {
			
			$(".pagephotobox-tag").remove();
			var currDiv = $(image).closest('div').attr('id');
			//var index = $('.' + this.settings.containerClassName + ' .' + this.settings.imageClassName).index(image);
			if(currDiv=='pagephotobox-all')
			var cur_post_id = $(image).attr('id');
			else
			var cur_post_id = currDiv.replace("pagephotobox", ""); 
			
			var image_src = image.attr("pagephotobox-src");
			var img_path_arr = image_src.split("/"); 
			var img_name = img_path_arr[img_path_arr.length-1];
			getPagePostComments_photospage(cur_post_id,img_name);
			
			
			var index = $('#'+currDiv+' .photo').index(image);
		    var totImgs = $('#'+currDiv+' .photo').length - 1;
			var nextIndex = index + 1;
			if(totImgs<nextIndex)
			nextIndex = -1;
			this.fbpMainImage.attr('fbp-index', index);
			var prevIndex = parseInt(index - 1);
			this.leftArrow.attr("data-prev-index", currDiv+'#'+prevIndex);
			this.rightArrow.attr("data-next-index", currDiv+'#'+nextIndex);
			this.fbpMainImage.attr('alt', image.attr('alt'));
			this.fbpMainImage.posX = image.offset().left;
			this.fbpMainImage.posY = image.offset().top;
			this.fbpMainImage.widthSrc = image.width();
			this.fbpMainImage.heightSrc = image.height();
			if (image.attr("pagephotobox-src")) {
				this.lazyLoadImage.src = image.attr("pagephotobox-src");
			}
			else {
				this.lazyLoadImage.src = image.attr("src");
			}
		},
		hide: function() {
			this.IsDisplayed = false;
			this.lazyLoadImage.src = '';
			var from = { posX: this.fbpMainImage.offset().left, posY: this.fbpMainImage.offset().top, widthSrc: this.fbpMainImage.width(), heightSrc: this.fbpMainImage.height()};
			var to = { posX: this.fbpMainImage.posX, posY: this.fbpMainImage.posY, widthSrc: this.fbpMainImage.widthSrc, heightSrc:this.fbpMainImage.heightSrc};
			var tmpNode = $('<img src=""/>').attr("src", this.fbpMainImage.attr("src"));
			this.fbpMainContainer.fadeOut({easing:'easeOutQuint', queue:false, duration:200});
			this.fbpOverlay.hide({easing:'easeOutQuint', queue:false, duration:200});
			this.photoTransitionAnimation(tmpNode, from, to, function() { tmpNode.remove(); });
			this.displayScroll();
		},
		initDOM: function() {
			var html = ['<div class="pagephotobox-main-container">',
							'<div class="pagephotobox-container-left">',
								'<table class="pagephotobox-main-image-table"><tr><td>',
									'<div class="tag-container"><img id="imgdetect" class="pagephotobox-main-image" src=""/></div>',
								'</td></tr></table>',
								'<div class="pagephotobox-image-stage-overlay">',
									'<div class="pagephotobox-container-left-header">',
										'<a title="Full Screen" class="pagephotobox-fc-btn pagephotobox-a"></a>',
									'</div>',
									'<div current-div="" data-prev-index="" class="left-arrow">',
										'<table style="height:100%"><tr><td style="vertical-align:middle;">',
											'<a class="pagephotobox-a" title="Previous"></a>',
										'</td></tr></table>',
									'</div>',
									'<div current-div="" data-next-index="" class="right-arrow">',
										'<table style="height:100%;"><tr><td style="vertical-align:middle;">',
											'<a class="pagephotobox-a" title="Next"></a>',
										'</td></tr></table>',
									'</div>',
									'<div class="pagephotobox-container-left-footer">',
										
									'</div>',
									//'<div class="pagephotobox-container-left-footer-bg"></div>',
								'</div>',
							'</div>',
							'<div class="pagephotobox-container-right">',
								'<div class="pagephotobox-close-btn">',
									'<a title="Close" href="" style="float:right;margin:8px">',
										'<img src="images/close.png" style="height:10px;width:10px"/>',
									'</a>',
									'<div style="clear:both"></div>',
								'</div>',
								'<div class="pagephotobox-image-content"></div>',
							'</div>',
							'<div style="clear:both"></div>',
						'</div>',
						'<div class="pagephotobox-fc-main-container">',
							'<div class="pagephotobox-fc-header">',
								'<div style="float:left">Dummy Header</div>',
								'<a class="pagephotobox-fc-close-btn" href="">Exit</a>',
								'<div style="clear:both"></div>',
							'</div>',
							'<div style="position:fixed;top:0px;right:0px;left:0px;bottom:0px;margin:auto;">',
								'<table style="width:100%;height:100%;text-align:center;">',
									'<tr>',
										'<td class="fc-left-arrow" style="width:50px;text-align:center;">',
											'<a class="pagephotobox-a" title="Previous"></a>',
										'</td>',
										'<td>',
											'<img class="pagephotobox-fc-main-image" src=""/>',
										'</td>',
										'<td class="fc-right-arrow" style="width:50px;text-align:center;">',
											'<a class="pagephotobox-a" title="Next"></a>',
										'</td>',
									'</tr>',
								'</table>',
							'</div>',
							'<div class="pagephotobox-fc-footer">Dummy Footer<div style="clear:both"></div></div>',
						'</div>',
						'<div class="pagephotobox-overlay"></div>',
						'<div style="clear:both"></div>'];
			$("body").append(html.join(""));
			this.settings.afterInitDOM();
		},
		initSettings: function() {
			if (this.settings.rightWidth != "") {
				$(".pagephotobox-container-right").css("width", this.settings.rightWidth);
			}
			
			if (this.settings.leftBgColor != "") {
				$(".pagephotobox-container-left").css("backgroundColor", this.settings.leftBgColor);
			}
			
			if (this.settings.rightBgColor != "") {
				$(".pagephotobox-container-right").css("backgroundColor", this.settings.rightBgColor);
			}
			
			if (this.settings.footerBgColor != "") {
				$(".pagephotobox-container-left-footer-bg").css("backgroundColor", this.settings.footerBgColor);
			}
			
			if (this.settings.overlayBgColor != "") {
				$(".pagephotobox-overlay").css("backgroundColor", this.settings.overlayBgColor);
			}
			
			if (this.settings.overlayBgOpacity != "") {
				$(".pagephotobox-overlay").css("opacity", this.settings.overlayBgOpacity);
			}
		},
		hideScroll: function() {
			$('body').css({width:$(window).width(),height:$(window).height(), overflow:"hidden"});
		},
		displayScroll: function() {
			$('body').css({width:this.bodyDimension.width, height:this.bodyDimension.height, overflow:"scroll"});
		},
		refreshBoxSize: function(image) {
			var isShow = image == null? false : true;
			image = image == null? this.lazyLoadImage : image;
			var leftContainer = $(".pagephotobox-container-left");
			var rightContainer = $(".pagephotobox-container-right");
			var imageWidth = image.width;
			var imageHeight = image.height;
			var maxWidth = Math.max($(window).width() - this.settings.rightWidth - this.settings.normalModeMargin*2, this.settings.minLeftWidth);
			var maxHeight = Math.max($(window).height() - this.settings.normalModeMargin*2, this.settings.minHeight);
			
			if (imageHeight < maxHeight) {
				leftContainer.height(imageHeight);
				this.fbpMainImage.css("max-height",imageHeight);
			}
			else {
				leftContainer.height(maxHeight);
				this.fbpMainImage.css("max-height",maxHeight);
			}
			if (imageWidth < maxWidth) {
				leftContainer.width(imageWidth);
				this.fbpMainImage.css("max-width",imageWidth);
			}
			else {
				leftContainer.width(maxWidth);
				this.fbpMainImage.css("max-width",maxWidth);
			}
						
			rightContainer.css("height", leftContainer.height());
			$(".pagephotobox-image-content").css("height", leftContainer.height() - $(".pagephotobox-close-btn").height());
			
			this.fbpMainContainer.css({
				width: (leftContainer.width() + rightContainer.width()),
				height: leftContainer.height()
			});
			if (isShow) {
				this.fbpMainImage.attr("src", "").attr("src", image.src);
				$(".pagephotobox-fc-main-image").attr("src","").attr("src", image.src);
				if (!this.IsDisplayed)
				{
					if (navigator.appVersion.indexOf("MSIE 7.") != -1) this.repositionBox();
					$(".pagephotobox-overlay").css("opacity",0).show();
					$(".pagephotobox-main-container").css("opacity",0).show();
					var from = { posX: this.fbpMainImage.posX, posY: this.fbpMainImage.posY, widthSrc: this.fbpMainImage.widthSrc, heightSrc: this.fbpMainImage.heightSrc};
					var to = { posX: this.fbpMainImage.offset().left, posY: this.fbpMainImage.offset().top, widthSrc: this.fbpMainImage.width(), heightSrc: this.fbpMainImage.height()};
					var tmpNode = $('<img src=""/>').attr("src", image.src);
					this.photoTransitionAnimation(tmpNode, from, to, function() {
						$(".pagephotobox-overlay").animate({opacity: 0.9}, {easing: 'easeOutQuint', queue: false, duration: 500});
						$(".pagephotobox-main-container").animate({opacity: 1}, {easing: 'easeOutQuint', queue: false, duration: 500,
						complete: function() {
							tmpNode.remove();
						}
						});
					});
					this.IsDisplayed = true;
				}
				
				this.fbpMainImage.show(10000, function() { $(this).trigger("onFbBoxImageShow"); });
				
				//handle left right arrow
				var index = parseInt(this.fbpMainImage.attr('fbp-index'));
			
				if (index - 1 < 0) {
					this.leftArrow.hide();
					$(".fc-left-arrow a").hide();
				}
				else {
					this.leftArrow.show();
					$(".fc-left-arrow a").show();
				}
				var datanextindex = this.rightArrow.attr("data-next-index").split("#")[1];
				if (index + 1 >= $('.' + this.settings.containerClassName + ' .' + this.settings.imageClassName).length || datanextindex==-1 ) {
					
					this.rightArrow.hide();
					$(".fc-right-arrow a").hide();
				}
				else {
					this.rightArrow.show();
					$(".fc-right-arrow a").show();
				}
			}
			
			if (!isShow) this.refreshTagSize();
		},
		refreshTagSize: function() {
			var $tag = $(".pagephotobox-tag");
			var newHeight = this.fbpMainImage.height();
			var newWidth = this.fbpMainImage.width();
			$tag.each(function() {
				$(this).css({
					left: $(this).attr("x")*newWidth,
					top: $(this).attr("y")*newHeight,
					width: $(this).attr("w")*newWidth,
					height: $(this).attr("h")*newHeight
				});
			});
		},
		refreshFullScreenSize: function() {
			$(".pagephotobox-fc-main-image").css({
				"max-width": $(window).width() - $(".fc-left-arrow").width() - $(".fc-right-arrow").width() - 20,
				"max-height": $(window).height() - $(".pagephotobox-fc-header").outerHeight(true) - $(".pagephotobox-fc-footer").outerHeight(true)
			});
			$(".pagephotobox-fc-main-image").closest("div").css("height", $(window).height() - $(".pagephotobox-fc-header").outerHeight(true) - $(".pagephotobox-fc-footer").outerHeight(true));
		},
		repositionBox: function() {
			var container = $(".pagephotobox-main-container");
			var left = ($(window).width() - container.width())/2;
			var top = ($(window).height() - container.height())/2;
			$(".pagephotobox-main-container").css({left: left, top: top});
		},
		addTags: function(tagsCo) {
			var imgHeight = this.fbpMainImage.height();
			var imgWidth = this.fbpMainImage.width();
			var tagNode = $(document.createElement('div')).attr("class", "pagephotobox-tag");
			for (var i=0; i < tagsCo.length; i++) {
				var tempNode = tagNode.clone();
				tempNode.css({
					position: "absolute",
					left: (tagsCo[i].x * imgWidth),
					top: (tagsCo[i].y * imgHeight),
					width: (tagsCo[i].w * imgWidth),
					height: (tagsCo[i].h * imgHeight),
					zIndex: 999
				}).attr({
					x: tagsCo[i].x,
					y: tagsCo[i].y,
					w: tagsCo[i].w,
					h: tagsCo[i].h
				});
				/*if (true || tagsCo[i].text) {
					var tipNode = $('<div style="background-color:white;">hello</div>');
					tempNode.append(tipNode);
					tipNode.html(tagsCo[i].text);
				}*/
				tempNode.appendTo(this.fbpMainImage.closest("div"));
			}
		},
		showFullScreen: function(image) {
			$(".pagephotobox-fc-main-container").show();
			this.refreshFullScreenSize();
		},
		hideFullScreen: function() {
			$(".pagephotobox-fc-main-container").hide();
		},
		photoTransitionAnimation: function(image, from, to, callbackFunc) {
			var leftFrom = from.posX - parseInt($("body").css("margin-left"));
			var topFrom = from.posY - parseInt($("body").css("margin-top"));
			var leftTo = to.posX - parseInt($("body").css("margin-left"));
			var topTo = to.posY - parseInt($("body").css("margin-top"));
			image.css({
				top: topFrom,
				left: leftFrom,
				width: from.widthSrc,
				height: from.heightSrc,
				position: 'absolute',
				zIndex:999
			});
			$("body").append(image);
			image.animate({
				top: topTo,
				left: leftTo,
				width: to.widthSrc,
				height: to.heightSrc
			}, {duration:10, easing:'easeInOutCubic', complete: function() {
				callbackFunc();
			}, queue:false});
		}
	};
		
	$.fn.pagephotobox = function(options) { 
		var args = Array.prototype.slice.call(arguments, 1);
		var item = $("body");
		var instance = item.data('pagephotobox');
		

		if (typeof options === 'string') {
			instance[options].apply(instance, args);
		}
		else {
			item.data('pagephotobox', new pagephotobox(options));
		}
	};
	
	$.fn.pagephotobox.defaults = {
		rightWidth: 360,
		minLeftWidth: 520,
		minHeight: 520,
		leftBgColor: "black",
		rightBgColor: "white",
		footerBgColor: "black",
		overlayBgColor: "black",
		overlayBgOpacity: 0.5,
		onImageShow: function() {},
		afterInitDOM: function() {},
		imageOverlayFadeSpeed: 150,
		normalModeMargin: 40,
		containerClassName: 'pagephotobox',
		imageClassName: 'pagephotobox-target-img'
	};
}(jQuery));
