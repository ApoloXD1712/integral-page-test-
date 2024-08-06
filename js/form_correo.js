$(document).ready(function() {
    var posX, posY;
    var delay = 750;
    var setTimeoutConst;
    var moduloText;
    $('body').mousemove(function(event) {
        posX = event.pageX;
        posY = event.pageY;
    });

    $(".checkbox-module").hover(function() {
        moduloText = $(this).find("img").attr("alt").split("$");
        setTimeoutConst = setTimeout(function() {
            posX += 20;
            posY += 20;
            $(".module-description").css({
                top: posY,
                left: posX
            });
            $(".module-description span").text(moduloText[0]);
            $(".module-description p").text(moduloText[1]);
            $(".module-description").removeClass("display_none");
        }, delay);
    }, function() {
        clearTimeout(setTimeoutConst);
    });

    $(".checkbox-module").mouseout(function() {
        $(".module-description").addClass("display_none");
    });

    $("#msgVersion").on("change", function() {
        var version = $(this).val();
        $(".checkbox-module").each(function() {
            var input_text = $(this).find("input").val();
            if (input_text.search(version) != -1) {
                $(this).removeClass("display_none");
            } else {
                $(this).addClass("display_none");
            }
        });
    });

});