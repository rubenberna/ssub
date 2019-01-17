(function($){
"use strict"; // Start of use strict
$(function() {
	//Tag Toggle
	if($('.toggle-tab').length>0){
		$('.toggle-tab').each(function(){
			$(this).find('.item-toggle-tab').first().find('.toggle-tab-content').show();
			$('.toggle-tab-title').on('click',function(event){
				if($(this).next().length>0){
					event.preventDefault();
					$(this).parent().siblings().removeClass('active');
					$(this).parent().addClass('active');
					$(this).parents('.toggle-tab').find('.toggle-tab-content').slideUp();
					$(this).next().stop(true,false).slideDown();
				}
			});
		});
	}
	//Popup Wishlist
	$('.wishlist-link').on('click',function(event){
		event.preventDefault();
		$('.wishlist-mask').fadeIn();
		var counter = 10;
		var popup;
		popup = setInterval(function() {
			counter--;
			if(counter < 0) {
				clearInterval(popup);
				$('.wishlist-mask').hide();
			} else {
				$(".wishlist-countdown").text(counter.toString());
			}
		}, 1000);
	});	
	//Title Tab Lamp
	if($('.title-lamp').length>0){
		$('.title-lamp').each(function(){
			$(this).append('<div class="ef-lamp"></div>');
			$(this).find('.ef-lamp').width($(this).find('li.active').width());
			var osl=$(this).find('li.active').offset().left-$(this).offset().left;
			$(this).find('.ef-lamp').css('left',osl+'px');
			$(this).find('.list-inline-block li a').on('click',function(){
				$(this).parents('.title-lamp').find('.ef-lamp').width($(this).parent().width());
				var osl=$(this).offset().left-$(this).parents('.title-lamp').offset().left;
				$(this).parents('.title-lamp').find('.ef-lamp').css('left',osl+'px');
			});
		});
	}
	//Menu Responsive



});
//Offset Menu
function offset_menu(){
	if($(window).width()>767){
		$('.main-nav .sub-menu').each(function(){
			var wdm = $(window).width();
			var wde = $(this).width();
			var offset = $(this).offset().left;
			var tw = offset+wde;
			if(tw>wdm){
				$(this).addClass('offset-right');
			}
		});
	}else{
		return false;
	}
}
//Fixed Header
function fixed_header(){
	if($('.header-ontop').length>0){
		if($(window).width()>1023){
			var ht = $('#header').height();
			var st = $(window).scrollTop();
			if(st>ht){
				$('.header-ontop').addClass('fixed-ontop');
			}else{
				$('.header-ontop').removeClass('fixed-ontop');
			}
		}else{
			$('.header-ontop').removeClass('fixed-ontop');
		}
	}
} 
//Slider Background
function background(){
	$('.bg-slider .item-slider').each(function(){
		var src=$(this).find('.banner-thumb a img').attr('src');
		$(this).css('background-image','url("'+src+'")');
	});	
}
function animated(){
	$('.banner-slider .owl-item').each(function(){
		var check = $(this).hasClass('active');
		if(check==true){
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).addClass(anime);
			});
		}else{
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).removeClass(anime);
			});
		}
	});
}
function slick_animated(){
	$('.banner-slider .item-slider').each(function(){
		var check = $(this).hasClass('slick-active');
		if(check==true){
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).addClass(anime);
			});
		}else{
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).removeClass(anime);
			});
		}
	});
}
//Document Ready
jQuery(document).ready(function(){
    if($('.js-item-banner').length>0){
        $('.js-item-banner').each(function(){
        	$(this).parents('.element-carousel-slider ').addClass('banner-slider bg-slider');
        })
    }
    //Detail Galleryx
    if($('.wrap-detail-gallery').length>0){
        $('.wrap-detail-gallery').each(function(){
        	var vertical='';
            var vertical = $(this).find(".carousel").data('vertical');
            $(this).find(".carousel").jCarouselLite({
                btnNext: $(this).find(".gallery-control .next"),
                btnPrev: $(this).find(".gallery-control .prev"),
                speed: 800,
                visible:4,
                vertical:vertical,
            });
            //Elevate Zoom
            if($(window).width()>991) {
            	$('.wrap-detail-gallery').find('.mid img').elevateZoom({scrollZoom : true});
            }
            $(this).find(".carousel a").on('click',function(event) {
                event.preventDefault();
                $('.zoomContainer').remove();
                $.removeData($('.wrap-detail-gallery').find('.mid img'), 'elevateZoom');
                $(this).parents('.wrap-detail-gallery').find(".carousel a").removeClass('active');
                $(this).addClass('active');
                var z_url =  $(this).find('img').attr("src");
                var srcset =  $(this).find('img').attr("srcset");
                $(this).parents('.wrap-detail-gallery').find(".mid img").attr("src", z_url);
                $(this).parents('.wrap-detail-gallery').find(".mid img").attr("srcset", srcset);
                $('.zoomWindow').css('background-image','url("'+z_url+'")');
                if($(window).width()>991) {
                    $('.wrap-detail-gallery').find('.mid img').elevateZoom({
                        scrollZoom : true
                    });
                }
            });

        });
    }
	//Fixed Main Nav
	$('.menu-fixed .btn-menu-fixed').on('click',function(event){
		event.preventDefault();
		$('.wrap').toggleClass('boxed-overlay');
	});
	//Banner Background
	if($('.adv-background').length>0){
		$('.adv-background').each(function(){
			var adv_src = $(this).find('.adv-thumb img').attr('src');
			$(this).css('background-image','url("'+adv_src+'")')
		});
	}
	//Banner Background
	if($('.quangcao-background').length>0){
		$('.quangcao-background').each(function(){
			var adv_src = $(this).find('.adv-thumb img').attr('src');
			$(this).css('background-image','url("'+adv_src+'")')
		});
	}
	//Week Count Down
	if($('.week-countdown').length>0){
        $('.week-countdown').each(function(){
            var data_date = $(this).attr('data-until');
            var format = $(this).attr('data-format');
            var labels = $(this).data('labels');
            var austDay =  new Date(data_date);
            $(this).countdown({
                until: austDay,
                format: format,
                labels: labels
            });
		})

	}
	$('.title-tab-gal-detail .list-inline-block a').on('click',function(event){
		event.preventDefault();
		var id = $(this).attr('href').substring(1);
		$('.tab-pane').each(function(){
			if($(this).attr('id')==id){
				var z_url = $(this).find(".mid img").attr('src');
				$('.zoomWindow').css('background-image','url("'+z_url+'")');
			}
		});
	});
	//Product Gallery
	$('.thumb-gallery a').on('click',function(event){
		event.preventDefault();
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		var src=$(this).find('img').attr('src');
		var srcset=$(this).find('img').attr('srcset');
		$(this).parents('.product-thumb').find('> a > img').attr('src',src);
		$(this).parents('.product-thumb').find('> a > img').attr('srcset',srcset);
	});
	//Widget Toggle
	$('.widget-title').on('click',function(){
		$(this).toggleClass('active');
		$(this).next().slideToggle();
	});
	//Widget Product Category
  
	$('.widget_product_categories ul li.cat-parent>i').on('click',function(event){
		event.preventDefault();
		$(this).next().next().slideToggle();
		$(this).toggleClass('fa-angle-down');
		$(this).toggleClass('fa-angle-up');
	});
	//Shop The Look
	$('.box-hover-dir').each( function() {
		$(this).hoverdir(); 
	});
	//Filter Price
    if($('.range-filter').length>0){
        $('.range-filter').each(function(){
            var pricemin = $(this).find(".slider-range").data('pricemin');
            var pricemax = $(this).find(".slider-range").data('pricemax');
            var currentmin = $(this).find(".slider-range").data('currentmin');
            var currentmax = $(this).find(".slider-range").data('currentmax');
            var currencysymbol = $(this).find(".slider-range").data('currencysymbol');
            $(this).find( ".slider-range" ).slider({
                range: true,
                min: pricemin,
                max: pricemax,
                values: [currentmin, currentmax  ],
                slide: function( event, ui ) {
                    $(this).parents('.range-filter').find( ".amount" ).html( '<label>'+ currencysymbol +'</label>' + '<span>' +ui.values[ 0 ]+'</span>' + ' - ' + '<span>' + ui.values[ 1 ]+'</span>');
                    $(this).parents('.range-filter').find( ".input-filter" ).html( '<input type="text" class="hide" id="min_price" name="min_price" value="'+ui.values[ 0 ]+'" /><input class="hide" type="text" id="max_price" name="max_price" value="'+ui.values[ 1 ]+'" />');
                }
            });
            $(this).find( ".amount" ).html( '<label>'+ currencysymbol +'</label>' + '<span>' +$(this).find( ".slider-range" ).slider( "values", 0 )+'</span>' + ' - ' + '<span>' +$(this).find( ".slider-range" ).slider( "values", 1 )+'</span>');
        });
    }

	//Qty Up-Down

	//Offset Menu
	offset_menu();
	//Animate
	if($('.wow').length>0){
		new WOW().init();
	}

    if($('.instagram-fancybox').length>0){
        $('.instagram-fancybox').fancybox();
    }
	//Back To Top
	$('.scroll-top').on('click',function(event){
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow');
	});
});
//Window Load
jQuery(window).load(function(){

	$('.item-post-format.item-blog-full .post-info-hidden').hide();
	$('.item-post-format.item-blog-full').on('mouseover',function(event){
		$(this).find('.post-info-hidden').stop(true,false).slideDown();
		$(this).find('.post-comment-date').stop(true,false).slideUp();
	});
	$('.item-post-format.item-blog-full').on('mouseout',function(event){
		$(this).find('.post-info-hidden').stop(true,false).slideUp();
		$(this).find('.post-comment-date').stop(true,false).slideDown();
	});
    if($('.masonry-list-post').length>0){
        $('.masonry-list-post').masonry({
            // options
            itemSelector: '.item-post-masonry',
        });
    }
	//Owl Carousel
	if($('.wrap-item').length>0){
		$('.wrap-item').each(function(){
			var data = $(this).data();
			var autoheight = false;
			if(data.autoheight != null) autoheight = data.autoheight;
			$(this).owlCarousel({
				addClassActive:true,
				stopOnHover:true,
				autoHeight:autoheight,
				itemsCustom:data.itemscustom,
				autoPlay:data.autoplay,
				transitionStyle:data.transition, 
				paginationNumbers:data.paginumber,
				beforeInit:background,
				afterAction:animated,
				navigationText:['<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>','<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>'],
			});
			$(this).find('.owl-controls').css('left',data.control+'px');
		});
	}
	//Parallax Slider
	if($('.parallax-slider').length>0){
		$(window).scroll(function() {
			var ot = $('.parallax-slider').offset().top;
			var sh = $('.parallax-slider').height();
			var st = $(window).scrollTop();
			var top = (($(window).scrollTop() - ot) * 0.4) + 'px';
			if(st>ot&&st<ot+sh){
				$('.parallax-slider .item-slider').css({
					'background-position': 'center ' + top
				});
			}
			if(st<ot){
				$('.parallax-slider .item-slider').css({
					'background-position': 'center 0'
				});
			}else{
				return false;
			}
		});
	}
	//Slick Slider
	if($('.slick-slider .slick').length>0){
		$('.slick-slider .slick').each(function(){
			$(this).slick({
				centerMode: true,
				infinite: true,
				centerPadding: '340px',
				slidesToShow: 1,
				prevArrow:'<div class="slick-prev"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></div>',
				nextArrow:'<div class="slick-next"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>',
				responsive: [
				{
				  breakpoint: 1200,
				  settings: {
					centerPadding: '0px',
				  }
				}]
			});
		});
	}		
});
//Window Resize
jQuery(window).resize(function(){
	offset_menu();
	fixed_header();
});
//Window Scroll
jQuery(window).scroll(function(){
	//Scroll Top
	if($(this).scrollTop()>$(this).height()){
		$('.scroll-top').addClass('active');
	}else{
		$('.scroll-top').removeClass('active');
	}
	//Fixed Header
	fixed_header();
});
})(jQuery); // End of use strict