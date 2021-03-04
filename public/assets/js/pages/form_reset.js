$(document).ready(function() {
    // form actions tab
    $('.reset_btn1').click(function() {
        var $form = $(".form_action1");
        $form[0].reset();
        $form.find('input, select, textarea').change();
    });
    $('.reset_btn2').click(function() {
        var $form = $(".form_action2");
        $form[0].reset();
        $form.find('input, select, textarea').change();
    });
    $('.reset_btn3').click(function() {
        var $form = $(".form_action3");
        $form[0].reset();
        $form.find('input, select, textarea').change();
    });
    $('.reset_btn4').click(function() {
        var $form = $(".form_action4");
        $form[0].reset();
        $form.find('input, select, textarea').change();
    });
    $('.reset_btn5').click(function() {
        var $form = $(".form_action5");
        $form[0].reset();
        $form.find('input, select, textarea').change();
    });

    // 2columns tab
    $('.reset_btn6').click(function() {
        var $form = $(".form_action6");
        $form[0].reset();
        $form.find('input, select, textarea').change();
    });

    // form full examples
    $('.form_full_reset1').click(function() {
        var $form = $(".form_full1");
        $form[0].reset();
        $form.find('input, select, textarea').change();
    });
    $('.form_full_reset2').click(function() {
        var $form = $(".form_full2");
        $form[0].reset();
        $form.find('input, select, textarea').change();
    });

    $('.form_full_reset3').click(function() {
        var $form = $(".form_full3");
        $form[0].reset();
        $form.find('input, select, textarea').change();
        $(".checkbox_right_label, .radio_right_label").addClass("reset_label");
    });

    $('.radio_right').on("click", function() {
        $(".radio_right_label").removeClass("reset_label");
    });
    $('.checkbox_right').on("click", function() {
        $(".checkbox_right_label").removeClass("reset_label");
    });

    // on blur script



    $('.radio_right').on("blur", function() {
        var rvalue = $('.radio_right').val();
        if (rvalue = "")
            $(".radio_right_label").addClass("reset_label");
    });
    $('.checkbox_right').on("blur", function() {
        var cvalue = $('.checkbox_right').val();
        if (cvalue = "")
            $(".checkbox_right_label").addClass("reset_label");
    });




    // form examples page
    $('.form_controls_reset').click(function() {
        var $form = $(".form_controls");
        $form[0].reset();
        $form.find('input, select, textarea').change();
    });

});
