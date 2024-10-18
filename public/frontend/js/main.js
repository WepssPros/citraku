(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner(0);

    // Sticky Navbar
    $(document).ready(function () {
        // Set logo default saat halaman dimuat
        $("#navbar-logo").attr("src", $("#navbar-logo").data("default-logo"));

        // Mengatur logo berdasarkan ukuran layar
        function updateLogo() {
            if ($(window).width() < 992) {
                // Ganti nilai 992 sesuai dengan breakpoint tablet yang Anda gunakan
                $("#navbar-logo").attr(
                    "src",
                    "/frontend/img/logotextcitradark.png"
                ); // Ganti dengan path yang sesuai
            } else {
                $("#navbar-logo").attr(
                    "src",
                    $("#navbar-logo").data("default-logo")
                );
            }
        }

        // Panggil fungsi saat halaman dimuat
        updateLogo();

        // Panggil fungsi saat jendela diubah ukurannya
        $(window).resize(function () {
            updateLogo();
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 45) {
                $(".navbar").addClass("sticky-top shadow-sm");
                $("#navbar-logo").attr(
                    "src",
                    $("#navbar-logo").data("scroll-logo") // Ganti dengan data-scroll-logo
                );
            } else {
                $(".navbar").removeClass("sticky-top shadow-sm");
                updateLogo(); // Menggunakan fungsi updateLogo untuk mengatur logo kembali
            }
        });
    });

    // International Tour carousel
    $(".InternationalTour-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav: false,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            },
        },
    });

    // packages carousel
    $(".packages-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: false,
        dots: false,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            },
        },
    });

    // testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            },
        },
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });

    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });
})(jQuery);
