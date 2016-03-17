/**
 * Created by matthewcatellier on 2016-03-16.
 */

    function isFormDataValid() {

        var dataIsValid = true;
        var message = "";
        $('#errormessage').hide();

        // is the email address valid?
        // is the password long enough?
        // is the password free of illegal characters?
        // does passwd_conf match the password?
        // is the captcha correct?
        // if so, the form data is valid so return true (else return false)

        if (dataIsValid == true) {
            if ($("#password").val().length < 1) {
                dataIsValid = false;
                message = "Password missing";
            }
        }

        if (dataIsValid == true) {
            if ($("#password").val().length < 6) {
                dataIsValid = false;
                message = "Password too short";
            }
        }

        if (dataIsValid == true) {
            // no tags allowed
            if ($("#password").val().indexOf('<') != -1) {
                dataIsValid = false;
                message = "Ilegal character in password";
            }
        }

        if (dataIsValid == true) {
            if ($("#password").val().indexOf('>') != -1) {
                dataIsValid = false;
                message = "Ilegal character in password";
            }
        }




        /*
         if(dataIsValid == true){
         alert('valid');
         }else{
         alert('invalid');
         }
         */
        return dataIsValid;
    }
