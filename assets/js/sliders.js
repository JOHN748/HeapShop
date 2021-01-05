// Category Slider

$(document).ready(function(){

$('.categories').slick({

	dots: false,
	infinite: true,
	speed: 2000,
	autoplay: true,
	autoplaySpeed: 2000,
	slidesToShow: 6,
	slidesToScroll: 2,

		responsive: [
			{
			breakpoint: 1024,
			settings: {
			slidesToShow: 6,
			slidesToScroll: 2,
			infinite: true,
			dots: true
			}
			},
			{
			breakpoint: 600,
			settings: {
			slidesToShow: 4,
			slidesToScroll: 2
			}
			},
			{
			breakpoint: 480,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1
			}
			}
		]
	});
});

// Featured Product Slider

$(document).ready(function(){

$('.featured_product').slick({

	dots: false,
	prevArrow: $(".prv-btn"),
	nextArrow: $(".nxt-btn"),
	infinite: true,
	speed: 2000,
	autoplay: true,
	autoplaySpeed: 2000,
	slidesToShow: 4,
	slidesToScroll: 2,

		responsive: [
			{
			breakpoint: 1024,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1
			}
			},
			{
			breakpoint: 600,
			settings: {
			slidesToShow: 2,
			slidesToScroll: 1
			}
			},
			{
			breakpoint: 480,
			settings: {
			slidesToShow: 1,
			slidesToScroll: 1
			}
			}
		]
	});
});
