$(document).ready(function() {
    $(".lista_modulos .modulo").click(function() {
        var logo = $(this).find(".logo").attr("src");
        var nombre = $(this).find(".logo").attr("alt");
        var desc = $(this).find(".desc").text();
        
        $(".info_modulos").insertAfter($(this).parent());
        
        $(".info_modulos").removeClass("display_none");

        // Imagen
        $(".info_modulos .logo img").attr("src", logo);

        // Título
        $(".info_modulos .title h3").text(nombre);

        // Descripción
        $(".info_modulos .description .text").text(desc);
    });

    // Lista de casos de éxito
    $(".lista_exitos .exito").click(function() {
        var logo = $(this).find(".escudo").attr("src");
        var nombre = $(this).find(".escudo").attr("alt");
        var desc = $(this).find(".desc").text();
        var url = $(this).find(".url").text();
        var contacts = $(this).find(".contactos").clone();

        $(".info_exitos").removeClass("display_none");

        // Imagen
        $(".info_exitos .logo img").attr("src", logo);

        // Título
        $(".info_exitos .title h3").text(nombre);

        // Descripción
        $(".info_exitos .description .text").text(desc);

        // URL
        $(".info_exitos .description .webpage").attr("href", url);

        //Teléfonos
        if ($(contacts).children().length > 0) {
            $(".info_exitos .description .contactos_title").removeClass("display_none");
            $(".info_exitos .description .contactos").replaceWith(contacts);
        } else {
            $(".info_exitos .description .contactos_title").addClass("display_none");
            $(".info_exitos .description .contactos").text("");
        }
    });
});