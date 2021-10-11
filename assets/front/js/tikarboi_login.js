$(function (){
    jQuery.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            if (regexp.constructor != RegExp)
                regexp = new RegExp(regexp);
            else if (regexp.global)
                regexp.lastIndex = 0;
            return this.optional(element) || regexp.test(value);
        },
    );
})

function loginsubmit(){
    $("#tikarboi-form-login").validate({
        rules: {
            email: {
                required: true,
                minlength: 3
            },
            password: {
                required: true
            },
            
        },
        onfocusout: function(element) {
            this.element(element); // triggers validation
        },
        onkeyup: function(element, event) {
            this.element(element); // triggers validation
        },
        messages: {
            email: {
                required: "Enter your Email",
                minlength: "Email at least 3 characters"
            },
            password: {
                required: "Enter your Password",
            }
        },
        submitHandler: function (form) {
            var data = $("#tikarboi-form-login").serialize();
            $.ajax({
                url: 'tikarboi_login_form',
                method: "post",
                data: data,
                dataType: "json",
                beforeSend: function(){
                    $("#overlay").fadeIn(300);　
                  },
                  complete: function(){
                    setTimeout(function(){
                        $("#overlay").fadeOut(300);
                      },500);
                  },
                success:function (response) {
                    console.log(response);
                    if(response == "doctor")
                    {
                        $.ajax({
                            url: 'doctor/login',
                            method: "post",
                            data: data,
                            dataType: "json",
                            success:function (response){
                                if(response == "success"){
                                    window.location.href = "doctor/dashboard";
                                }
                                else{
                                    $("#tikarboi-form-login").trigger("reset");
                                    $("#msg .content").html("");
                                    $("#msg .content").html("Given Email & Password does not match with our records");
                                    $("#msg").css("display","block");
                                }
                            }
                        });
                    }
                    else if(response == "patient"){
                        $.ajax({
                            url: 'patient/login',
                            method: "post",
                            data: data,
                            dataType: "json",
                            success:function (response){
                                if(response == "success"){
                                 window.location.href = "patient/dashboard";
                                }
                                else{
                                    $("#tikarboi-form-login").trigger("reset");
                                    $("#msg .content").html("");
                                    $("#msg .content").html("Given Email & Password does not match with our records");
                                    $("#msg").css("display","block");
                                }
                            }
                        });
                    }
                    else{
                        $("#tikarboi-form-login").trigger("reset");
                        $("#msg .content").html("");
                        $("#msg .content").html("Given Email & Password does not match with our records");
                        $("#msg").css("display","block");
                    }
                }
            })
        }
    });
}