/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Home Slider
5. Init SVG


******************************/

$(document).ready(function () {
    "use strict";

    /*

	1. Vars and Inits

	*/

    var header = $(".header");
    var hamb = $(".hamburger");
    var hambActive = false;
    var menuActive = false;

    setHeader();

    $(window).on("resize", function () {
        setHeader();
    });

    $(document).on("scroll", function () {
        setHeader();
    });

    setTimeout(function () {
        $.colorbox({
            html: "<h2>Call For a Free Quote</h2>",
            className: "cta",
            width: 350,
            height: 150,
        });
    }, 10000);

    initMenu();
    selectLink();
    initHomeSlider();
    loadCookie();
    showReplySection();
    showGalleryReplySection();
    showJobForm();
    initSvg();

    // event click on .menu-dropdown
    $(".what-we-do-menu-arrow").on("click", function () {
        $(this).parent().toggleClass("what-we-do-dropdown");
        menuActive = true;
    });

    /*

	2. Set Header

	*/

    function setHeader() {
        if ($(window).scrollTop() > 100) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    }

    /*

	 Control highlighting of navbar links

	*/

    function selectLink() {
        $("#navbar a").click(function () {
            $("#navbar a").removeClass("active");
            $(this).addClass("active");
        });
    }

    /*

	3. Init Menu

	*/

    function initMenu() {
        if ($(".hamburger").length) {
            var hamb = $(".hamburger");

            hamb.on("click", function (event) {
                event.stopPropagation();

                if (!menuActive) {
                    openMenu();

                    $(document).on("click", function cls(e) {
                        if ($(e.target).hasClass("menu_mm")) {
                            // $(document).one("click", cls);
                        } else if ($(e.target).hasClass("menu-dropdown")) {
                            // openDropdown();
                        } else {
                            closeMenu();
                        }
                    });
                } else {
                    $(".menu_container").removeClass("active");
                    menuActive = false;
                }
            });
        }
    }

    function openMenu() {
        var fs = $(".menu_container");
        fs.addClass("active");
        hambActive = true;
        menuActive = true;
    }

    function closeMenu() {
        var fs = $(".menu_container");
        fs.removeClass("active");
        hambActive = false;
        menuActive = false;
    }

    /*

	2. Init Home Slider

	*/

    function initHomeSlider() {
        let owl = $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 1000,
            smartSpeed: 1500,
            autoplayHoverPause: true,
        });
        owl.on("changed.owl.carousel", function (event) {
            if ($(".owl-item.active").children(".slide-1").length) {
                $(".slide-1-box").removeClass("box-brown");
                $(".slide-1-box").removeClass("text-white");
                $(".slide-2-box").addClass("box-brown");
                $(".slide-2-box").addClass("text-white");
            }
            if ($(".owl-item.active").children(".slide-2").length) {
                $(".slide-2-box").removeClass("box-brown");
                $(".slide-2-box").removeClass("text-white");
                $(".slide-3-box").addClass("box-brown");
                $(".slide-3-box").addClass("text-white");
            }
            if ($(".owl-item.active").children(".slide-3").length) {
                $(".slide-3-box").removeClass("box-brown");
                $(".slide-3-box").removeClass("text-white");
                $(".slide-4-box").addClass("box-brown");
                $(".slide-4-box").addClass("text-white");
            }
            if ($(".owl-item.active").children(".slide-4").length) {
                $(".slide-4-box").removeClass("box-brown");
                $(".slide-4-box").removeClass("text-white");
                $(".slide-1-box").addClass("box-brown");
                $(".slide-1-box").addClass("text-white");
            }
        });
    }

    /*

	6. Init SVG

	*/

    function initSvg() {
        jQuery("img.svg").each(function () {
            var $img = jQuery(this);
            var imgID = $img.attr("id");
            var imgClass = $img.attr("class");
            var imgURL = $img.attr("src");

            jQuery.get(
                imgURL,
                function (data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find("svg");

                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== "undefined") {
                        $svg = $svg.attr("id", imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== "undefined") {
                        $svg = $svg.attr("class", imgClass + " replaced-svg");
                    }

                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr("xmlns:a");

                    // Replace image with new SVG
                    $img.replaceWith($svg);
                },
                "xml"
            );
        });
    }

    // loads the cookie section
    function loadCookie() {
        if (readCookie("sticky-bar-cookie")) {
            document.getElementById("sticky-bar").style.display = "none";
        }
        function createCookie(name, value, days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
                var expires = "; expires=" + date.toGMTString();
            } else var expires = "";
            document.cookie = name + "=" + value + expires + "; path=/";
            document.getElementById("sticky-bar").style.display = "none";
        }
        function readCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0)
                    return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
        function eraseCookie(name) {
            createCookie(name, "", -1);
        }
        function hide(obj) {
            var el = document.getElementById(obj);
            el.style.display = "none";
        }
    }

    // shows reply section for the blog page
    function showReplySection() {
        $("#reply-text").click(function () {
            $("#reply-form").show("slow");
        });
        $("#close-form").click(function () {
            $("#reply-form").hide("slow");
        });
    }

    // shows reply section for the gallery page
    function showGalleryReplySection() {
        $("#gallery-reply-text").click(function () {
            $("#gallery-reply-form").show("slow");
        });
        $("#close-form").click(function () {
            $("#gallery-reply-form").hide("slow");
        });
    }

    // activate form on click reply text
    function showJobForm() {
        $("#applicationForm").hide();
        $("#applicationFormLink").click(function () {
            $("#applicationForm").toggle("slide");
        });
    }
});
