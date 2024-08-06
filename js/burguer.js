(function() {
    'use strict';
    document.addEventListener("DOMContentLoaded", function() {

        var barra = $('.nav_menubar');
        var hamburguesa = $('.burguer')[0];
        var mobile = window.matchMedia("(max-width: 700px)");
        if (mobile.matches) {
            barra.slideUp();
        }

        hamburguesa.addEventListener("click", function() {
            barra.slideToggle();
        });
        window.addEventListener('resize', function() {
            var mobile = window.matchMedia("(min-width: 768px)");
            if (mobile.matches) {
                barra.slideDown();
            } else {
                barra.slideUp();
            }

        });


    });

})();
