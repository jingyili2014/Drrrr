
	(function ($) {
		
			"use strict";
			
			$('[data-toggle="collapse"]').on('click',function () {
				if($(this).is("span"))
					$(this).toggleClass('has-sub');
			});
			
			//after window loaded - disable loader
			$(window).on('load',function() {
				$('body').addClass('loaded');
			});
			
			if ($(window).width() > 767){
			
				var containerWidth = $('.container').width();
				
				//hidden sidebar show
				$('.hidden-sidebar-icon').on('click',function () {
						
					//set container margin for more smooth animation
					var containerMarginCalc = ($( window ).width() - $('.container').width()) /2;
					$('.container').css('margin-right', containerMarginCalc + 'px');
					
					if($('.hidden-sidebar').css('display') == 'none'){
							
						//set hidden bar position if is opened from secondary navigation
						var bottomSidebarPosition = $(window).height() - $('.hidden-sidebar').outerHeight(true);
						if ( bottomSidebarPosition <0){
							bottomSidebarPosition = $('.hidden-sidebar').outerHeight(true) - $(window).height();
						}
							
						if ( $(window).scrollTop() > bottomSidebarPosition ) {
							$('.hidden-sidebar').css({'position':'fixed','top':'auto','bottom':'0'});
						}	
						else {	
							$('.hidden-sidebar').css({'position':'absolute','top':'0', 'bottom':'auto'});
						}
							
						//animate display hidden sidebar 
						$('.hidden-sidebar').show();
						$('.container').delay(150).animate({
										marginRight:'30%',
										width:'70%'},700,"linear");
						$('#primaryNav').animate({
										marginRight:'30%'
										},700,"linear");
						
						$(this).toggleClass('fa-bars').fadeOut(100);
						$(this).addClass('fa-window-close').fadeIn(100);
										
					}	
					else { //animate hide hidden sidebar
						$('.hidden-sidebar').fadeOut(200);
						$('.container').animate({
											width:containerWidth+'px',
											marginRight: ($( window ).width() - containerWidth )/2 + 'px'
											},500,"linear");
						$('#primaryNav').animate({
											marginRight:'0%'
											},700,"linear");

						$(this).removeClass('fa-window-close').fadeOut(100);
						$(this).toggleClass('fa-bars').fadeIn(100);											
					}
				});	
				
				//hide hidden sidebar
				$('#sidebar-close').on('click',function () {
					$('.hidden-sidebar').fadeOut(200);
					$('.container').animate({
										width:containerWidth+'px',
										marginRight: ($( window ).width() - containerWidth )/2 + 'px'},500,"linear");
					$('#primaryNav').animate({
											marginRight:'0%'
											},700,"linear");

					$('.hidden-sidebar-icon').removeClass('fa-window-close').fadeOut(100);
					$('.hidden-sidebar-icon').toggleClass('fa-bars').fadeIn(100);											
					
				});
					
				
				$(window).on('scroll', function() {
					
					//scroll to top
					if ($(this).scrollTop() >= 700) {
						$('.scroll-to-top').fadeIn(200);    
					}	
					else {
						$('.scroll-to-top').fadeOut(200);   
					}	
					
					//hidden sidebar window fill	
					if($('.hidden-sidebar').css('display') != 'none')
					{
						var bottomSidebarPosition = $(window).height() - $('.hidden-sidebar').outerHeight(true);
						if ( bottomSidebarPosition <0){
							bottomSidebarPosition = $('.hidden-sidebar').outerHeight(true) - $(window).height();
						}
							
						if ( $(window).scrollTop() > bottomSidebarPosition ) {
							$('.hidden-sidebar').css({'position':'fixed','top':'auto','bottom':'0'});
						}	
						else {	
							$('.hidden-sidebar').css({'position':'absolute','top':'0', 'bottom':'auto'});
						}	
					}
				});	
				
				
			}
			else
			{
				$('.navbar-toggle').on('click',function() {
				
					if($('.menu-toggle').hasClass('fa-bars')){
						$('.menu-toggle').toggleClass('fa-bars').delay(100).addClass('fa-window-close').fadeIn(200);
					}
					else{	
						$('.menu-toggle').removeClass('fa-window-close');
						$('.menu-toggle').toggleClass('fa-bars').delay(100).fadeIn(200);	
					}
				});				
			}		

			//show search form
			$('.hidden-search-icon').on('click',function () {
				
				if($('.search-form-container').css('display') == 'none'){
					$('.search-form-container').fadeIn(400);
				}	
				else {
					$('.search-form-container').fadeOut(400);   
				}	
			});
			
			//hide search form
			$('.search-form-close').on('click',function () {
				$('.search-form-container').fadeOut(400);   
			});	
			
			//scroll to top click
			$('#return-to-top').on('click',function() { //link-icon click      
				$('body,html').animate({scrollTop : 0 }, 500);
			});
			
			$('.scroll-to-top').on('click',function() { //div container click      
				$('body,html').animate({scrollTop : 0 }, 500);
			});
			
			//display and hide top bar shopping cart on click
			$('.hidden-cart-icon').on('click',function(){
				if($('.top-bar-shopping-cart').css('display') == 'none')
					$('.top-bar-shopping-cart').show().fadeIn(400);	
				else
					$('.top-bar-shopping-cart').fadeOut(400);						
			});
			
			//hide top bar shopping cart on click
			$('.hide-top-bar-shopping-cart').on('click',function(){
				$('.top-bar-shopping-cart').fadeOut(400);
			});	
	
			// Add product quantity button - Single Product Page 
			$('.add-product-quantity-button').on('click',function(){
				
				var inputId = $(this).attr("data-input-id");
				var inputValue = parseInt($('#'+inputId).val()); 
				if( inputValue == null || inputValue == 0 || isNaN(inputValue)){
					inputValue = 1;
				}
				
				$('#'+inputId).val(parseInt(inputValue+1));
			});

			// Remove product quantity button - Single Product Page 
			$('.remove-product-quantity-button').on('click',function(){
				
				var inputId = $(this).attr("data-input-id");
				var inputValue = parseInt($('#'+inputId).val()); 
				if( inputValue == null || inputValue == 0 || isNaN(inputValue)){
					inputValue = 1;
				}
				
				if( inputValue > 1 ){
					$('#'+inputId).val(parseInt(inputValue-1));
				}	
				
			});	

			//display product tabs on click	
			$('.product-tabs-title').on('click',function(){
				
				var tabTitleId = $(this).attr("id");
				var tabContentId = $(this).attr("aria-controls");
				
				
				//set title classes
				$('.product-tabs-title').removeClass('active');
				$('#'+tabTitleId).addClass('active');
				
				//set content classes
				$('.product-desc-tab-container').removeClass('active');
				$('.product-desc-tab-container').addClass('hidden');
				$('#'+tabContentId).removeClass('hidden');
				$('#'+tabContentId).addClass('active');
				
			});	

			$(window).on('scroll', function() {
				
				//sticky menu 
				if ($(this).scrollTop() >= 500){         
					$('#sticky-menu').fadeIn(400);   
				}	
				else {
					$('#sticky-menu').fadeOut(400);   
				}
					
				//sticky menu progress bar
				var windowHeight = $('.content-container').outerHeight();
				var windowWidth = $(window).width();
							
				var progressPosition =  $(this).scrollTop() - $('.content-container').offset().top;
						
				if (progressPosition >= 0){
					var progressBarWidth = (windowWidth * progressPosition)/windowHeight;

					$('.sticky-progress-bar').animate({width: progressBarWidth},1,'linear');
				}
				else{
					$('.sticky-progress-bar').animate({width: 0+'px'},1,'linear');
				}				
			});	
			
						
			$(document).ready(function(){

				//woocommerce display gallery thumbs as featured image
				$('.product-thumb-img').on('mouseover', function(){
					
					var productImgSrc = $(this).attr('src');
					
					$('.product-main-featured-image').attr('href',productImgSrc);
					$('.product-main-img').fadeOut(function(){
						$(this).attr('src',productImgSrc).fadeIn();
					});	
				});	
				
				//woocommerce update cart button always enabled
				$( '.shop_table.cart' ).closest( 'form' ).find( 'button[name=\"update_cart\"]' ).removeProp( 'disabled' );
				
				
				
				/* ---------------------------------------------------------------------------
				Owl Carousel Scripts 
				---------------------------------------------------------------------------- */	
				
				$(".popular-posts-slider").owlCarousel({
								items:1,
								loop:true,
								lazyLoad: true,
								nav : true, 
								pagination: true,
								dots:true, 
								smartSpeed:700,
								margin:0,
								center:true,
								autoWidth:false,
								autoHeight:true,
								dotsData:true,
								stagePadding:0, 
								navText:  ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
								responsive : {	
									0 : { 
											items:1,
											autoHeight:false,
											autoWidth:false
										},
										767 : {
											items:1 
										},
										991 : {	
											items:1
										},
										1300 :{ 
											items:1 
										}
								}
				});
				
				$(".popular-posts-slider-3").owlCarousel({
								items:3,
								loop:true,
								lazyLoad: false,
								smartSpeed:700,
								margin:0,
								center:true,
								autoWidth:false,
								autoHeight:true,
								nav : true, 
								pagination: true,
								dots:true, 
								dotsData:true,
								stagePadding:0, 
								navText:  ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
								responsive : {	
									0 : { 
											items:1,
											autoHeight:false,
											autoWidth:false
										},
										767 : {
											items:3 ,
											nav : true, 
											pagination: true,
											dots:true, 
											dotsData:true,
										},
										991 : {	
											items:3,
											nav : true, 
											pagination: true,
											dots:true, 
											dotsData:true,
										},
										1300 :{ 
											items:3,
											nav : true, 
											pagination: true,
											dots:true, 
											dotsData:true,											
										}
								}
				});
				
				$(".main-post-gallery-container").owlCarousel({
								items:1,
								loop:true,
								lazyLoad: true,
								nav : true, 
								pagination: false,
								dots:false, 
								smartSpeed:700,
								margin:0,
								center:true,
								autoWidth:false,
								autoHeight:true,
								stagePadding:0, 
								navText:  ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
								responsive : {	
									0 : { 
											items:1,
											autoHeight:true,
											autoWidth:false
										},
										767 : {
											items:1 
										},
										991 : {	
											items:1
										},
										1300 :{ 
											items:1 
										}
								}
				});
				
				
			});	

			

	})(jQuery);	