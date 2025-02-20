function openWindowModal(hidden){
	// debugger
	console.log(hidden)
	$('#openModal').addClass('active')
	$('#form').val(hidden)
}
function openInfo(){
	$('#openModal2').addClass('active')
	// $('#form').val(hidden)
}
/* =================================
------------------------------------
	Template Name: Industry.INC 
	Description: Industry.INC HTML Template
	Author: colorlib
	Author URI: https://www.colorlib.com/
	Version: 1.0
	Created: colorlib
 ------------------------------------
 ====================================*/


'use strict';

var owl;

$(window).on('load', function() {
	$(".loader").fadeOut();
	$("#preloder").delay(400).fadeOut("slow");
	$('#openModal2 .modal-body').load('/politics.html#politics')
});

(function($) {

	$('#scrollMenu button').on('click', function() {
		$(this).toggleClass('is-active');
		$('#leftMenu').toggleClass('active');
	});

	$('#scrollMenu a').click(function(){
		$('#scrollMenu button').click()
	})

	$(window).scroll(function() {
		// console.log($(window).scrollTop())
		if ($(window).scrollTop() > 188) {
			$('#scrollMenu').addClass('active')
		} else {
			$('#scrollMenu').removeClass('active')
		}
	})

	$('.servicesButton').click(function(){
		let txt = $(this).parents('.col-6').find('span').text()
		openWindowModal(txt)
	})
	$('.openInfo').click(function(){
		openInfo()
	})
	$('#order').click(function(){
		let txt = $('.hero-item h2').text()
		openWindowModal(txt)
	})
	/*------------------
		Navigation
	--------------------*/
	$('.site-nav-menu > ul').slicknav({
		appendTo:'.header-section',
		label: 'Меню',
		closedSymbol: '<i class="fa fa-angle-down"></i>',
		openedSymbol: '<i class="fa fa-angle-up"></i>',
		allowParentLinks: true
	});

	// $('.slicknav_nav').append('<li class="search-switch-warp"><button class="search-switch"><i class="fa fa-search"></i></button></li>');


	/*------------------
		Search model
	--------------------*/
	$('.search-switch').on('click', function() {
		$('.search-model').fadeIn(400);
	});

	$('.search-close-switch').on('click', function() {
		$('.search-model').fadeOut(400,function(){
			$('#search-input').val('');
		});
	});


	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});


	/*------------------
		Hero Slider
	--------------------*/
	$('.hero-slider').owlCarousel({
		nav: false,
		dots: false,
		loop: false,
		navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		autoplay: true,
		items: 1,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
	});

	$('.wparrepReviews').owlCarousel({
		nav: true,
		dots: false,
		loop: false,
		navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		autoplay: false,
		margin: 40,
		responsive:{
			0:{
				items:1,
				margin: 0
			},
			600:{
				items:2
			},
			800:{
				items:2
			},
			992:{
				items:2
			},
			1200:{
				items:2
			},
		}
	});

	/*------------------
		Brands Slider
	--------------------*/
	$('#client-carousel').owlCarousel({
		nav: false,
		loop: true,
		margin:20,
		autoplay: true,
		responsive:{
			0:{
				items:2,
				margin: 0
			},
			600:{
				items:3
			},
			800:{
				items:4
			},
			992:{
				items:4
			},
			1200:{
				items:5
			},
		}
	});

	/*---------------------
		Testimonial Slider
	----------------------*/
	owl = $('.testimonial-slider').owlCarousel({
		nav: false,
		dots: false,
		loop: false,
		navigation: true,
		dots: true,
		autoplay: false,
		items: 1,
	});
	$('.wrapper-bg-testimonial').owlCarousel({
		nav: false,
		dots: false,
		loop: false,
		autoplay: true,
		items: 1,
	});

	/*------------------
		Image Popup
	--------------------*/
	$('.video-popup').magnificPopup({
		type: 'iframe'
	});
	
	/*------------------
		Accordions
	--------------------*/
	$('.panel-link').on('click', function (e) {
		$('.panel-link').parent('.panel-header').removeClass('active');
		var $this = $(this).parent('.panel-header');
		if (!$this.hasClass('active')) {
			$this.addClass('active');
		}
		e.preventDefault();
	});

	/*------------------
		Progress Bar
	--------------------*/
	$('.progress-bar-style').each(function() {
		var progress = $(this).data("progress");
		var prog_width = progress + '%';
		if (progress <= 100) {
			$(this).append('<div class="bar-inner" style="width:' + prog_width + '"><span>' + prog_width + '</span></div>');
		}
		else {
			$(this).append('<div class="bar-inner" style="width:100%"><span>' + prog_width + '</span></div>');
		}
	});

	/*------------------
		Circle progress
	--------------------*/
	$('.circle-progress').each(function() {
		var cpvalue = $(this).data("cpvalue");
		var cpcolor = $(this).data("cpcolor");
		var cpid 	= $(this).data("cpid");

		$(this).prepend('<div class="'+ cpid +' circle-warp"><h2>'+ cpvalue +'%</h2></div>');

		if (cpvalue < 100) {

			$('.' + cpid).circleProgress({
				value: '0.' + cpvalue,
				size: 112,
				thickness: 3,
				fill: cpcolor,
				emptyFill: "rgba(0, 0, 0, 0)"
			});
		} else {
			$('.' + cpid).circleProgress({
				value: 1,
				size: 112,
				thickness: 3,
				fill: cpcolor,
				emptyFill: "rgba(0, 0, 0, 0)"
			});
		}

	});

	$('#openModal')
    .click(function(){         // вешаем основной обработчик на родителя
        $(this).removeClass('active');        
        // $(this).removeClass('info');        
    })
    .children()
    .click(function(e){        // вешаем на потомков
        e.stopPropagation();   // предотвращаем всплытие
    });
    $('#openModal2')
    .click(function(){         // вешаем основной обработчик на родителя
        $(this).removeClass('active');        
        // $(this).removeClass('info');        
    })
    .children()
    .click(function(e){        // вешаем на потомков
        e.stopPropagation();   // предотвращаем всплытие
    });
    $('#close').click(function(e){
    	e.preventDefault();
    	$(this).parents('#openModal').removeClass('active');
    	return false
    })
    $('#close2').click(function(e){
    	e.preventDefault();
    	$(this).parents('#openModal2').removeClass('active');
    	return false
    })

    $('#mainForm').submit(function(e){
    	e.preventDefault()
    	// alert("Данные не отправлены")
    	$.ajax({
            url: './create.php',
            method: 'post',
            dataType: 'html',
            data: $('#mainForm').serialize(),
            // async: false,
            success: function(data){
        		alert('Спасибо, данные отправлены, пожалуйста ожидайте, скоро Вас наберет менеджер')
                console.log(data)
            },
            error: function(e){
							console.log(e)
            	alert("Ошибка! Данные не были отправлены")
            }
        })  
        $('#openModal').removeClass('active');
        $('#name').val('');
        $('#phone').val('');
        $('#comment').val('');
    })

    $("#phone").mask("+7(999) 999-99-99");


	$("a").on("click", function(e){
	    let x = $(this).attr('href').split('#')
	    // debugger
	    if (x[1] != undefined) {
	    	e.preventDefault();
		    var anchor = $(this).attr('href');
		    $('html, body').stop().animate({
		        scrollTop: $(anchor).offset().top - 60
		    }, 800);
	    }
	});

	$('#reviewsForm').submit(function(e){
    	e.preventDefault()
    	// alert("Данные не отправлены")
    	$.ajax({
            url: './create.php',
            method: 'post',
            dataType: 'html',
            data: $('#reviewsForm').serialize(),
            // async: false,
            success: function(data){
        		alert('Спасибо, отзыв отправлен!')
                console.log(data)
            },
            error: function(){
            	alert("Ошибка! Данные не были отправлены")
            }
        })
        $(this).find('input, textarea').attr('disabled','disabled')
	})


})(jQuery);




