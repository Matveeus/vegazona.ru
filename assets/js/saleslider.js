jQuery(document).ready(function(){
	jQuery('.slider').slick({
		infinite: true,
  		slidesToShow: 4,
  		slidesToScroll: 2,
		arrows:true,
		dots:false,
		autoplay:false,
		speed: 900,
		autoplaySpeed:800,
		responsive:[
			{
				breakpoint: 1459,
				settings: {
					slidesToShow:3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 981,
				settings: {
					slidesToShow:2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 698,
				settings: {
					slidesToShow:1,
					slidesToScroll: 1
				}
			}
		]
	});
});

