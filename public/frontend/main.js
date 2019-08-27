
    function ValidateEmail(mail,div)
    {

     if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
      {
        return (true)
      }
        // $(div).html("You have entered an invalid email address!")
        return 'error';
    }

    function GetCardType(number)
    {
        // visa
        var re = new RegExp("^4");
        if (number.match(re) != null)
        {
            $("#card_number").addClass('visa_card');
            return "Visa";
        }

        // Mastercard
        // Updated for Mastercard 2017 BINs expansion
         if (/^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$/.test(number))
         {
            return "Mastercard";
         }

        // AMEX
        re = new RegExp("^3[47]");
        if (number.match(re) != null)
        {
            $("#card_number").addClass('amex_card');
            return "AMEX";
        }

        // Discover
        re = new RegExp("^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)");
        if (number.match(re) != null)
        {
            $("#card_number").addClass('discover_card');
            return "Discover";
        }

        // Diners
        re = new RegExp("^36");
        if (number.match(re) != null)
        {
            $("#card_number").addClass('diners_card');
            return "Diners";
        }

        // Diners - Carte Blanche
        re = new RegExp("^30[0-5]");
        if (number.match(re) != null)
        {
            $("#card_number").addClass('carte_card');
            return "Diners - Carte Blanche";
        }

        // JCB
        re = new RegExp("^35(2[89]|[3-8][0-9])");
        if (number.match(re) != null)
        {
            $("#card_number").addClass('jcb_card');
            return "JCB";
        }

        // Visa Electron
        re = new RegExp("^(4026|417500|4508|4844|491(3|7))");
        if (number.match(re) != null)
        {
            $("#card_number").addClass('visa_electron_card');
            return "Visa Electron";
        }

        $("#creditForm").css('opacity','1');
        $("#card_number").css('border-color','red');
        $("#creditPForm :input").prop("disabled", false);
        $("#card_number").after('<span class="error_card">Inavlid Card Number!</span>');

        console.log("invalid");
    }
    function payment_form_validation(values)
    {
        $(".error_card").remove();
        $("#creditPForm :input").css('border-color','');
        var errors =[];
        if(values[0]=="")
        {
            errors.push("credit");
        }
        if(values[1]=="")
        {
            errors.push('card_number');
        }
        if(values[2]=="")
        {
            errors.push('expiration');
        }
        if(values[3]=="")
        {
            errors.push('cvv');
        }
        if(values[4]=="")
        {
            errors.push('fname');
        }
        if(values[4]=="")
        {
            errors.push('lname');
        }
        errors.forEach(errorMsg);

    }
    function errorMsg(value, index, array) {

        $("#"+value).css('border-color','red');
        if(value!='card_number')
        {
            $("#"+value).after('<span class="error_card">Required Field!</span>');
        }
      }
      function validate(evt,id) {
        var type = $("."+id+ " input").attr('type');
            
        if(type=='number')
        {
            var theEvent = evt || window.event;
            console.log(theEvent);

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
            // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
            setTimeout(function(){

                if($("#qty").val()!="")
                {
                    var qty = $("#qty").val();
                    var lotAmount = $("#totalAmount").attr('lot-amount');
                    $("#totalAmount").html(lotAmount*qty);
                    console.log(evt.which);
                    if ((evt.which != 46 || qty.indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) {
                       
                        var int = qty.split(".");
                            $("#lotSize").html('<font color="red"><b>Only round number</b></font>');
                            $("#qty").val(int[0]);

                            if(qty=="")
                                $("#qty").val('1');
                    }
                    else
                    {
                        $("#lotSize").html('Anzahl der Lose');
                        $("."+id+" span.error_card").remove();
                        $("."+id+" span#error_card").remove();
                    }
                }
                $("."+id+" input").css('border-color','');

            },300);
        }
        else
        {
            $("."+id+" span.error_card").remove();
            $("."+id+" input").css('border-color','');
            $("."+id+" span#error_card").remove();

        }




        // alert(qty);

    }
