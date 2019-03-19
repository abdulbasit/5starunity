(function($) {

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            if(element[0].id=="state" && $("#"+element[0].id).val()=="")
                {
                    $("#state").addClass('form_error');
                }
                if(element[0].id=="country" && $("#"+element[0].id).val()=="")
                {
                    $("#country").addClass('form_error');
                }

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
            }
        },
        messages : {
            email: {
                email: 'Not a valid email address <i class="zmdi zmdi-info"></i>'
            }
        },
        onfocusout: function(element) {
            $(element).valid();
        },
    });
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Submit',
            current: ''
        },
        titleTemplate: '<div class="title"><span class="number">#index#</span>#title#</div>',
        onStepChanging: function(event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
                $("#state").removeClass('form_error');
                $("#country").removeClass('form_error');

            // console.log(form.steps("getCurrentIndex"));
            return form.valid();
        },
        onFinishing: function(event, currentIndex)
        {

            form.validate().settings.ignore = ":disabled";
            console.log(currentIndex);

            // var dateOfBirth = $("#dob").val();

            //     dateOfBirth = dateOfBirth.split('-');
            //     today = new Date()
            //     past = new Date(dateOfBirth[2],dateOfBirth[1],dateOfBirth[0]);
            //     ageDiff = calcDate(today,past)

            //     if(ageDiff<=18)
            //     {
            //         $("#dob").addClass('form_error');
            //         $("#dobMsg").html('You must bee 18+');
            //         return false;
            //     }
            //     else
            //     {
            //         $("#dob").removeClass('form_error');
            //         $("#dobMsg").html('');
            //     }

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
            if($("#identity_card").val()=="")
            {
                $("#id_prrof").addClass('form_error');
                return false;
            }
            else{
                $("#id_prrof").removeClass('form_error');
            }
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            $(".actions ul li:nth-child(2) a").html('Waite...')
            setTimeout(function (){
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
    })

    $("#profile_pic").change(function () {
        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
    })
    $("#resident_proof").change(function () {
        $('.resImg').text(this.value.replace(/C:\\fakepath\\/i, ''))
    })
    $("#identity_card").change(function () {
        $('.idImg').text(this.value.replace(/C:\\fakepath\\/i, ''))
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
