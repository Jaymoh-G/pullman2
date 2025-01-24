/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu


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
	showSections();
	scrollFromTop()
	
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



	//show divs on click podcasts section
	function showSections()
	{
		$(".btn-options").click(function(){
			let val = $(this).attr('id');
			if(val == 'videos-btn'){
				$('#videos').show('slow');
				$('#photos,#publications,#podcasts').hide('slow');
				$("#videos-btn").css("background-color","#111112");
				$("#videos-btn").css("color","#fff");
				$("#podcasts-btn,#photos-btn,#publications-btn").css("background-color","#fff");
				$('#podcasts-btn,#photos-btn,#publications-btn').css( "color","rgb(41, 39, 39)");
	
			}else if(val == 'photos-btn'){
				$('#photos').show('slow');
				$('#videos,#publications,#podcasts').hide();
				$("#photos-btn").css("background-color","#111112");
				$("#photos-btn").css("color","#fff");
				$("#photos-btn").css("background-color","#111112");
				$("#photos-btn").css("color","#fff");
				$("#podcasts-btn,#videos-btn,#publications-btn").css("background-color","#fff");
				$('#podcasts-btn,#videos-btn,#publications-btn').css( "color","rgb(41, 39, 39)");
	
			}else if(val == 'publications-btn'){
				$('#publications').show('slow');
				$('#videos,#photos,#podcasts').hide();
				$("#publications-btn").css("background-color","#111112");
				$("#publications-btn").css("color","#fff");
				$("#photos-btn,#videos-btn,#podcasts-btn").css("background-color","#fff");
				$('#photos-btn,#videos-btn,#podcasts-btn').css( "color","rgb(41, 39, 39)");
				
			}else{
				$('#podcasts').show('slow');
				$('#videos,#photos,#publications').hide();
				$("#podcasts-btn").css("background-color","#111112");
				$("#podcasts-btn").css("color","#fff");
				$("#podcasts-btn").css("background-color","#111112");
				$("#podcasts-btn").css("color","#fff");
				$("#photos-btn,#videos-btn,#publications-btn").css("background-color","#fff");
				$('#photos-btn,#videos-btn,#publications-btn').css( "color","rgb(41, 39, 39)");
			}
			
		})
		
	}

	function scrollFromTop(){
		$(window).scroll(function(){
			var scrollPos = $("#videos").scrollTop();
			console.log(scrollPos);
		});
    }

});