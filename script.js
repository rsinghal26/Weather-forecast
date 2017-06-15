$("form").submit(function(e) {

            var error ="";
            if($("#city").val() == ""){

                $("#error").html("<div class='alert alert-danger' role='alert'><p><strong>Please Enter Your City.</strong></p>" + error + "</div>");

                return false;
              }else{

                return true;
              }    
         })      