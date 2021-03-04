$('.collapse').on('shown.bs.collapse', function() {
    $(this).parent().find(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-remove");
}).on('hidden.bs.collapse', function() {
    $(this).parent().find(".glyphicon-remove").removeClass("glyphicon-remove").addClass("glyphicon-chevron-down");
});

$('.subcollapse').on('shown.bs.subcollapse', function() {
    $(this).parent().find(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-remove");
}).on('hidden.bs.subcollapse', function() {
    $(this).parent().find(".glyphicon-remove").removeClass("glyphicon-remove").addClass("glyphicon-chevron-down");
});

$(function() {
    gallery();
});

function gallery() {
    function mixitup() {
        $("#faq").mixItUp({
            animation: {
                duration: 300,
                effects: "fade translateZ(-360px) stagger(34ms)",
                easing: "ease"

            }
        });
    }

    mixitup();
}
