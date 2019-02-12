$(function(){
    $("body").on("submit", "#loginRegister_form", function(){
        var form              = $("#loginRegister_form");
        var submit            = $("#loginRegister_form button[type=submit]");
        var errors_container  = $(".alert_modal");

        submit.button("loading");
        errors_container.empty().hide();

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            success: function(data) {
                switch (data.status) {
                    case "ok":
                        location.href = data.return_uri;
                        //location.reload();
                    break;

                    case "error":
                        $("input[data-id=csrf-name]").attr("name", data.csrf_name_key).val(data.csrf_name);
                        $("input[data-id=csrf-value]").attr("name", data.csrf_value_key).val(data.csrf_value);

                        $.each(data.message_c, function( key, value ) {
                            errors_container.append(value + "<br />");
                        });
                        errors_container.css("display", "inline-block");
                    break;

                    default:
                        location.reload();
                }

                submit.button("reset");
            },
            error: function() {
                location.reload();
            }
        });

        return false;
    });
});