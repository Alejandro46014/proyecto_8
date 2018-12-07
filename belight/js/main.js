(function(){
	
	"use strict";
	
	
	
	
	
})();

/*-------------empieza jquery---------------*/

$( document ).ready(function() {
'use strict';
	
	/*-----------------BARRA FIJA SCROLL---------------*/
	
	var windowHeight=$(window).height();
	var barraAltura=$('.barra').innerHeight();
	
	$(window).scroll(function(){
		var scroll=$(window).scrollTop();
		if(scroll>windowHeight){
			
			$('.barra').addClass('fixed');
			$('body').css({'margin-top':barraAltura +'px'});
		}else{
			
			$('.barra').removeClass('fixed');
			$('body').css({'margin-top':'0px'});
		}
		
	});
	
	/*--------------MENÜ MOVIL-----------------*/
	
	$('.menu-movil').on('click',function(){
		
		$('.navegacion-principal').slideToggle();
		
	});
	
	$('.user-icono').on('click',function(){
		
		$('.extendido-usuarios').slideToggle();
		
	});
	
	
	/*------------------addclass body---------*/
	
	$('body.patinetes .navegacion-principal a:contains("Patinetes")').addClass('activo');
	
	$('body.bicicletas .navegacion-principal a:contains("Bicicletas")').addClass('activo');
	
	$('body.segways .navegacion-principal a:contains("Segways")').addClass('activo');
	
	$('body.ninebots .navegacion-principal a:contains("Ninebots")').addClass('activo');
	
	$('body.monociclos .navegacion-principal a:contains("Monociclos")').addClass('activo');
	
	$('body.hoverboards .navegacion-principal a:contains("Hoverboards")').addClass('activo');
	
	
	
	
	
	
});//fin document ready