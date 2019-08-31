(function($) {
$( document ).ready(function() {
    setTimeout(function(){
        isMobile();
    },100);
    $(".actions").attr('style','position: relative !important; bottom: 170px !important; width: auto !important; float: right; right: 122px');
});
function isMobile() {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )
       {
            $(".actions").removeAttr('style');
            return true;
       }
       else
       {
           return false;
       }
  }

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            // $("#state").addClass('form_error');
            // if($("#country").val()=="")
            //     $("#country").addClass('form_error');
            // else
            //     $("#country").removeClass('form_error');

            // if($("#city").val()=="")
            //     $("#city").addClass('form_error');
            // else
            //     $("#city").removeClass('form_error');

            // if($("#postal_code").val()=="")
            //     $("#postal_code").addClass('form_error');
            // else
            //     $("#postal_code").removeClass('form_error');

            // if($("#postal_code").val()=="")
            //     $("#phone").addClass('form_error');
            // else
            //     $("#phone").removeClass('form_error');

            // if($("#profile_pic").val()=="")
            //     $("#profile_pic").addClass('form_error');
            // else
            //     $("#profile_pic").removeClass('form_error');

            // if($("#identity_card_front").val()=="")
            //     $("#identity_card_front").addClass('form_error');
            // else
            //     $("#identity_card_front").removeClass('form_error');

            // if($("#identity_card_back").val()=="")
            //     $("#identity_card_back").addClass('form_error');
            // else
            //     $("#identity_card_back").removeClass('form_error');
            element.before(error);

        },
        rules: {
            username: {
                required: true,
            },
            resident_proof: {
                required: true,
            },
            identity_card: {
                required: true,
            },
            email: {
                required: true,
                email : true
            },
            country: {
                required: true
            },
            city: {
                required: true
            }
        },
        messages : {
            email: {
                email: 'Not a valid email address <i class="zmdi zmdi-info"></i>'
            }
        },
        onfocusout: function(element) {
            if($("#identity_card").val()=="")
            {
                $("#id_prrof").css('boder',"solid 1px red");
            }
            else
            {
                $("#id_prrof").css("border","none");
            }
            $(element).valid();
        },
    });
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        labels: {
            previous: 'ZURÜCK',
            next: 'WEITER',
            finish: 'SENDEN',
            current: ''
        },
        titleTemplate: '<div id="title_id_#index#" class="title"><span id="#index#" class="number">#index#</span>#title#</div>',
        onStepChanging: function(event, currentIndex, newIndex)
        {


            setTimeout(function(){
                var activeButtons =  $('.actions ul').find("li:visible").length;
                if(activeButtons==3)
                {
                     $(".actions ul li:last-child").css("display", "none");
                }
             },300);
            if(newIndex<3)
            {
                $("#"+newIndex).removeClass('number');
                $("#"+newIndex).addClass('formActive');
                $("#title_id_"+newIndex).css('color','green');
            }
            setTimeout(function(){
                $(".actions").css('display','none');
            },310);
            setTimeout(function(){

                var fieldset = $(".body:visible").attr('id');
                if(fieldset=='signup-form-p-2' && isMobile()===false)
                {
                    $(".actions").attr('style','width:90%; position: relative !important; bottom: 0; float: right; right: 122px');
                    $(".actions ul").attr('style','float:right !important; width:auto !important; position:relative; top:63px');
                }
                if(fieldset=='signup-form-p-1' && isMobile()===false)
                {
                    $(".actions").attr('style','position: relative !important; bottom: 105px !important; width: auto !important; float: right;');
                    $(".actions ul").attr('style','position:relative; top:0px; margin-left:25px');
                }
                if(fieldset=='signup-form-p-0' && isMobile()===false)
                {
                    $(".actions").attr('style','position: relative !important; bottom: 188px !important; width: auto !important; float: right; right: 122px');
                    $(".actions ul").attr('style','position:relative; top:0px; margin-left:25px');
                }
            },300)
            setTimeout(function(){
                $(".actions").fadeIn('slow');
            },400);
            if(newIndex==2 && $("#identity_card").val()!="")
            {
                scollPos();
            }
            else if(newIndex==2 && $("#identity_card").val()=="")
            {
                $("#id_prrof").css('border','solid 1px red');
            }
            else
            {
                $("#remsCheck").remove();
            }

            // var title = $('.actions ul li:first-child');
            // console.log(title.attr('class'));

                if(currentIndex < newIndex)//check if previous button is clicked
                {
                    form.validate().settings.ignore = ":disabled,:hidden";
                    $("#state").removeClass('form_error');
                    return form.valid();
                }
                return form;
        },
        onFinishing: function(event, currentIndex)
        {

            form.validate().settings.ignore = ":disabled";

            var dateOfBirth = $("#dob").val();
            dateOfBirth = dateOfBirth.split('.');
            // dateOfBirth[2],dateOfBirth[1],dateOfBirth[0]
            var age = calculateAgeValidate(dateOfBirth[1], dateOfBirth[0], dateOfBirth[2]);
            if(age<18)
            {
                setTimeout(function(){
                    $("#dob").addClass('error');
                    $("#dob-error").css('display','block');
                    $("#dob-error").html('You must be 18+');
                },1000);
                return false;
            }
            else
            {
                $("#dob-error").css('display','none');
                $("#dob-error").html(' ');
                $("#dob").removeClass('error');
            }
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            $(".actions ul li:nth-child(2) a").html('Waite...')
            setTimeout(function (){
                // if()
                $( "#signup-form" ).submit();
            },1000);

        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });


    $.dobPicker({
        daySelector: '#expiry_date',
        monthSelector: '#expiry_month',
        yearSelector: '#expiry_year',
        dayDefault: 'DD',
        yearDefault: 'YYYY',
        minimumAge: 0,
        maximumAge: 120
    });

    $('#password').pwstrength();

    $('#button').click(function () {
        $("input[type='file']").trigger('click');
    });
    $("#profile_pic").change(function () {

        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''));
    })
    $("#resident_proof").change(function () {

        $('.resImg').text(this.value.replace(/C:\\fakepath\\/i, ''))
    })
    $("#identity_card").change(function () {


        $('.idImg').text(this.value.replace(/C:\\fakepath\\/i, ''))
    });
    $("#identity_card_front").change(function () {

        $('.idImg1').text(this.value.replace(/C:\\fakepath\\/i, ''))
    });
    $("#identity_card_back").change(function () {

        $('.idImg2').text(this.value.replace(/C:\\fakepath\\/i, ''))
    });

    function calcDate(date1,date2) {
        var diff = Math.floor(date1.getTime() - date2.getTime());
        var day = 1000 * 60 * 60 * 24;

        var days = Math.floor(diff/day);
        var months = Math.floor(days/31);
        var years = Math.floor(months/12);

        var message = '';
        message += days + " days "
        message += months + " months "
        message += years + " years ago \n"
        // alert(years);
        return years
        }

function calculateAgeValidate(birthMonth, birthDay, birthYear) {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();
    var currentDay = currentDate.getDate();
    var calculatedAge = currentYear - birthYear;

    if (currentMonth < birthMonth - 1) {
        calculatedAge--;
    }
    if (birthMonth - 1 == currentMonth && currentDay < birthDay)
    {
        calculatedAge--;
    }
        return calculatedAge;
}

})(jQuery);
function scollPos() {

    $( ".actions ul li" ).last().css('display','block');
    $( ".actions ul li" ).last().attr('onclick','acceptTerms()');
    $( ".actions ul li a" ).last().attr('href',"");
    // console.log(ddd);
    var checkbox='';
    $("#remsCheck").remove();
    $(".actions").append('<div id="remsCheck" style="margin-top:50px !important"> </div>');
    checkbox+='<div style="width:100%; float:left; margin-top:10px"><span style="float:left; margin-left:10px; margin-top:15px"><input onclick="acceptTerms()" type="checkbox" id="terms_check" name="terms_check"></span><span id="termsCondTxt" style="float:left; margin-right:10px; margin-top:8px">Allgemeine Nutzungsbedingungen gelesen und akzeptieren</span></div>';
    checkbox+='<div id="dataCheck" style="width:100%; float:left; margin-top:10px"><span style="float:left; margin-left:10px; margin-top:15px"><input onclick="acceptTerms()" type="checkbox" id="data_check" name="terms_check"></span><span id="dataSecurityTxt" style="float:left; margin-right:10px; margin-top:8px">Datenschutzerklärung gelesen und akzeptieren</span></div>';
    checkbox+='<div id="18plus" style="width:100%; float:left; margin-top:10px"><span style="float:left; margin-left:10px; margin-top:15px"><input onclick="acceptTerms()" type="checkbox" id="age_check" name="terms_check"></span><span id="18Txt" style="float:left; margin-right:10px; margin-top:8px">Ich bestätige über 18 Jahre zu sein</span></div>';
    checkbox+='<div id="18plus" style="width:100%; float:left; margin-top:10px"><span style="float:left; margin-left:10px; margin-top:15px"><input type="checkbox" id="subscribe" name="subscribe"></span><span id="18Txt" style="float:left; margin-right:10px; margin-top:8px">Newsletter abonnieren</span></div>';
    $("#remsCheck").html(checkbox);

}
function acceptTerms()
{

    // $(".actions ul").attr('style','position:relative; top:0px; margin-left:50px');
    if($("#terms_check").is(":checked")===false)
        {
            $( ".actions ul li a" ).last().attr('href',"");
            $("#termsCondTxt").css('color','red');
        }
    else
        {
            $("#termsCondTxt").css('color','black');
        }
     if($("#data_check").is(":checked")===false)
        {
            $( ".actions ul li a" ).last().attr('href',"");
            $("#dataCheck").css('color','red');
        }
    else
        {
            $("#dataCheck").css('color','black');
        }
    if($("#age_check").is(":checked")===false)
        {
            $( ".actions ul li a" ).last().attr('href',"");
            $("#18plus").css('color','red');
        }
    else
        {
            $("#18plus").css('color','black');
        }
    if($("#terms_check").is(":checked")===true && $("#data_check").is(":checked")===true && $("#age_check").is(":checked")===true)
        {
            $(".actions ul li a").last().attr('href',"#finish");
        }

}
