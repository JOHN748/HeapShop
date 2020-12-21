$(document).ready(function(){

$('.categories').slick({

	dots: true,
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



$(document).ready(function(){

$('.featured_products').slick({

	dots: false,
	prevArrow:"<i class='fas fa-eye' style='cursor:pointer;'></i>",
    nextArrow:"<i class='fas fa-eye' style='cursor:pointer;'></i>",
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
			slidesToShow: 4,
			slidesToScroll: 2,
			infinite: true,
			dots: true
			}
			},
			{
			breakpoint: 600,
			settings: {
			slidesToShow: 3,
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
