// FONCTIONS JAVASCRIPT


// fonction qui sert à faire apparaître/cacher un élément, on lui passe en paramètre l'ID html de l'élément en question
function showElement($id) {

	let x = document.getElementById($id);
	x.classList.toggle('hidden');
}


// scroll-top permettant de remonter en haut de page
$(window).scroll(function() {
    if ($(this).scrollTop() >= 200) {        // si on scroll à + de 200px
        $('#scroll-top').fadeIn(200);    // faire apparaître
    } else {
        $('#scroll-top').fadeOut(200);   // sinon faire disparaître
    }
});

$('#scroll-top').click(function() {      // animation pour remonter au clic
    $('body,html').animate({
        scrollTop : 0                       
    }, 500);
});



// Sliders SLICK de la page "La team"

// Slider de la galerie

$('.slider').slick({

	infinite: true,
	dots: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	speed: 500,
	fade: true,
	cssEase: 'linear',
	autoplay: true,
	autoplaySpeed: 2000

});


// Slider Testimonial (avis client)

$('.testimonial').slick({

	infinite: true,
	dots: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	responsive: [
	{
		breakpoint: 1300,
		settings: {
	    
	    	slidesToShow: 3,
	    	slidesToScroll: 1
	  	}
	},

	{
		breakpoint: 800,
		settings: {

	    	slidesToShow: 2,
	    	slidesToScroll: 1
	  	}
	},

	{
		breakpoint: 580,
		settings: {

	    	slidesToShow: 1,
	    	slidesToScroll: 1
	  	}
	}
	]
});