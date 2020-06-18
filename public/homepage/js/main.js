/* =================================
------------------------------------
	Unica - University Template
	Version: 1.0
 ------------------------------------
 ====================================*/



'use strict';


var window_w = $(window).innerWidth();

$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut();
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {

	/*------------------
		Navigation
	--------------------*/
	$('.nav-switch').on('click', function(event) {
		$('.main-menu').slideToggle(400);
		event.preventDefault();
	});


	/*------------------
		Background set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});


	/*------------------
		Hero Slider
	--------------------*/
	var window_h = $(window).innerHeight();
	var header_h = $('.header-section').innerHeight();
	var nav_h = $('.nav-section').innerHeight();
	var top_h = $('.top-navbar').innerHeight();

	if (window_w > 767) {
		$('.hs-item').height((window_h)-(330));
		console.log($('.hs-item').height());
	}

	$('.hero-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		mouseDrag: false,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
		items: 1,
		autoplay: true,

	});

	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
	center:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1200:{
            items:4
        }
    }
})


	/*------------------
		Counter
	--------------------*/
	$(".counter").countdown("2018/07/01", function(event) {
		$(this).html(event.strftime("<div class='counter-item'><h4>%D</h4>Days</div>" + "<div class='counter-item'><h4>%H</h4>hours</div>" + "<div class='counter-item'><h4>%M</h4>Mins</div>" + "<div class='counter-item'><h4>%S</h4>secs</div>"));
	});


	/*------------------
		Gallery
	--------------------*/
	$('.gallery').find('.gallery-item').each(function() {
		var pi_height1 = $(this).width(),
		pi_height2 = pi_height1/2;

		if($(this).hasClass('gi-long') && window_w > 991){
			$(this).css('height', pi_height2);
		}else{
			$(this).css('height', Math.abs(pi_height1));
		}
	});

	$('.gallery').masonry({
		itemSelector: '.gallery-item',
		columnWidth: '.grid-sizer'
	});



	/*------------------
		Testimonial
	--------------------*/
	$('.testimonial-slider').owlCarousel({
		loop: true,
		nav: true,
		dots: true,
		animateOut: 'fadeOutUp',
		animateIn: 'fadeInUp',
		navText: ['<i class="fa fa-angle-left"></i>', '</i><i class="fa fa-angle-right"></i>'],
		items: 1,
		autoplay: true
	});



	/*------------------
		Popup
	--------------------*/
	$('.img-popup').magnificPopup({
		type: 'image',
		mainClass: 'img-popup-warp',
		removalDelay: 400,
	});

	// Morris charset

	new Morris.Bar({
		element: 'peminat_chart',
		data: [
		{ year: '2015', a: 668},
		{ year: '2016', a: 892},
		{ year: '2017', a: 901},
		{ year: '2018', a: 1373},
		{ year: '2019', a: 1529}
		],
		xkey: 'year',
		ykeys: ['a'],
		labels: ['Peminat'],
		barColors: ['#5a4618'],
		resize : true
	});

	new Morris.Bar({
		element: 'penelitian_chart',
		data: [
		{ year: '2017', a: 80},
		{ year: '2018', a: 100},
		{ year: '2019', a: 110}
		],
		xkey: 'year',
		ykeys: ['a'],
		labels: ['Publikasi'],
		barColors: ['#5a4618'],
		resize : true
	});

	new Morris.Bar({
		element: 'publikasi_chart',
		data: [
		{ year: '2017', a: 80},
		{ year: '2018', a: 100},
		{ year: '2019', a: 110}
		],
		xkey: 'year',
		ykeys: ['a'],
		labels: ['Mahasiswa Baru'],
		barColors: ['#5a4618'],
		resize : true
	});

	// Sticky

	// window.onscroll = function() {myFunction()};

	// var navbar = document.getElementById("navbar");
	// var sticky = navbar.offsetTop;

	// function myFunction() {
	//   if (window.pageYOffset >= sticky) {
	//     navbar.classList.add("sticky")
	//   } else {
	//     navbar.classList.remove("sticky");
	//   }
	// }

	// Animation

	//fade
	// $(document).ready(function(){
	// 	$(".btn-s1").click(function(){
	// 	    $("#s1").fadeIn();
	// 		$("#s2").fadeOut();
	// 	});
	// 	$(".btn-s2").click(function(){
	// 		$("#s1").fadeOut();
	// 		$("#s2").fadeIn();
	// 	});
	// });



})(jQuery);
