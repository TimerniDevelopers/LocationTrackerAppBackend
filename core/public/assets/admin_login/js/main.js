$(document).ready(function($){
    "use strict";

  //==============================
  // smooth scroll
  //==============================

  $( document ).ready(function() {

         
           
                  $(function() {
                    $("form[name='login']").validate({
                      rules: {
                        
                        email: {
                          required: true,
                          email: true
                        },
                        password: {
                          required: true,
                          
                        }
                      },
                       messages: {
                        email: "Please enter a valid email address",
                       
                        password: {
                          required: "Please enter password",
                         
                        }
                        
                      },
                      submitHandler: function(form) {
                        form.submit();
                      }
                    });
                  });
                  
         
         
         $(function() {
           
           $("form[name='registration']").validate({
             rules: {
               firstname: "required",
               lastname: "required",
               email: {
                 required: true,
                 email: true
               },
               password: {
                 required: true,
                 minlength: 5
               }
             },
             
             messages: {
               firstname: "Please enter your firstname",
               lastname: "Please enter your lastname",
               password: {
                 required: "Please provide a password",
                 minlength: "Your password must be at least 5 characters long"
               },
               email: "Please enter a valid email address"
             },
           
             submitHandler: function(form) {
               form.submit();
             }
           });
         });
         
  });
}(jQuery));
