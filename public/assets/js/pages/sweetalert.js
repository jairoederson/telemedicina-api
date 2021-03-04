
$(document).ready(function() {
    $('#btn1').on('click',function(){

            swal("Good job!", "You clicked the button!", "info")
    });
    $('#btn2').on('click',function() {
        swal({
            title: "Below is the message",
            text: "Here's your text message in the sweet alert!"
        });
    });
    $('#btn3').on('click',function(){
        swal("Good job!", "You clicked the button!", "success")
    });
    $('#btn4').on('click',function(){
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F89A14",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        });
    });
    $('#btn5').on('click',function(){
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF6F6C",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });
    $('#btn6').on('click',function(){
        swal({   title: "Sweet!",   text: "Here's a custom image.",   imageUrl: "{{ asset('assets/images/13.jpg') }}" });
    });

    $('#btn7').on('click',function(){
        swal({   title: "Sweet!",   text: "Here's a custom image.",   imageUrl: "{{ asset('assets/images/c2.jpg') }}" });
    });
    $('#btn8').on('click',function(){
      let pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/
      var re = new RegExp(pattern);

      if (re.test(document.getElementById("emailSuscripion").value)) {
        swal({
          title: "Suscripcion con Éxito",
          text: "Gracias Por suscribirte.",
          timer: 2000,  showConfirmButton: false
        });
        document.getElementById("emailSuscripion").value = "";
      } else {

      }
    });
    $('#btn9').on('click',function(){
        swal({
            title: "Ajax request example",
            text: "Submit to run ajax request",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function () {
            setTimeout(function () {
                swal("Ajax request finished!");
            }, 2000);
        });
    });
    $('#btn10').on('click',function(e){
        e.preventDefault();
        $('input').addClass('form-control');
        swal({   title: "An input!",
            text: "Write something interesting:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something"
        },
            function(inputValue){
            if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                swal("Nice!", "You wrote: " + inputValue, "success");
        });
    });
});
