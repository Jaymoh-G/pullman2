/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Loaders


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var header = $('.header');
	var hamb = $('.hamburger');
	var hambActive = false;
	var menuActive = false;
	var ctrl = new ScrollMagic.Controller();

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	initMenu();
	initLoaders();
	new WOW().init();
	initSlideProjects();
	showAppForm();

	/* 

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 100)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/* 

	3. Init Menu

	*/

	function initMenu()
	{
		if($('.hamburger').length)
		{
			var hamb = $('.hamburger');

			hamb.on('click', function(event)
			{
				event.stopPropagation();

				if(!menuActive)
				{
					openMenu();
					
					$(document).one('click', function cls(e)
					{
						if($(e.target).hasClass('menu_mm'))
						{
							$(document).one('click', cls);
						}
						else
						{
							closeMenu();
						}
					});
				}
				else
				{
					$('.menu_container').removeClass('active');
					menuActive = false;
				}
			});
		}
	}

	function openMenu()
	{
		var fs = $('.menu_container');
		fs.addClass('active');
		hambActive = true;
		menuActive = true;
	}

	function closeMenu()
	{
		var fs = $('.menu_container');
		fs.removeClass('active');
		hambActive = false;
		menuActive = false;
	}

	/* 

	8. Init Loaders

	*/

	function initLoaders()
	{
		if($('.loader').length)
		{
			var loaders = $('.loader');

			loaders.each(function()
			{
				var loader = this;
				var endValue = $(loader).data('perc');

				var loaderScene = new ScrollMagic.Scene({
		    		triggerElement: this,
		    		triggerHook: 'onEnter',
		    		reverse:false
		    	})
		    	.on('start', function()
		    	{
		    		var bar = new ProgressBar.Circle(loader,
					{
						color: '#20d34a',
						// This has to be the same size as the maximum width to
						// prevent clipping
						strokeWidth: 3,
						trailWidth: 0,
						trailColor: 'transparent',
						easing: 'easeInOut',
						duration: 1400,
						text:
						{
							autoStyleContainer: false
						},
						from:{ color: '#20d34a', width: 3 },
						to: { color: '#20d34a', width: 3 },
						// Set default step function for all animate calls
						step: function(state, circle)
						{
							circle.path.setAttribute('stroke', state.color);
							circle.path.setAttribute('stroke-width', state.width);

							var value = Math.round(circle.value() * 100);
							if (value === 0)
							{
								circle.setText('0%');
							}
							else
							{
								circle.setText(value + "%");
							}
						}
					});
					bar.text.style.fontFamily = '"Roboto", sans-serif';
					bar.text.style.fontSize = '30px';
					bar.text.style.fontWeight = '500';
					bar.text.style.color = "#232323";


					bar.animate(endValue);  // Number from 0.0 to 1.0
		    	})
			    .addTo(ctrl);
			});
		}
	}

	function initSlideProjects()
	{
		$('#carousel-example').on('slide.bs.carousel', function (e) {

			/*
				CC 2.0 License Iatek LLC 2018
				Attribution required
			*/
			var $e = $(e.relatedTarget);
			var idx = $e.index();
			var itemsPerSlide = 5;
			var totalItems = $('.carousel-item').length;
			
			if (idx >= totalItems-(itemsPerSlide-2)) {
				var it = itemsPerSlide - (totalItems - idx);
				for (var i=0; i<it; i++) {
					// append slides to end
					if (e.direction=="left") {
						$('.carousel-item').eq(i).appendTo('.carousel-inner');
					}
					else {
						$('.carousel-item').eq(0).appendTo('.carousel-inner');
					}
				}
			}
		});
	}

	function showAppForm(){
		$(".btn-apply").click(function(){
			$("#app-form").show("slow");
		})
	}
	

});