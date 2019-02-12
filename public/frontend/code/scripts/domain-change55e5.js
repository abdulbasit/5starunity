$(function(){
    var query;

    $("body").on("click", ".equity_campaign", function(e) {
        e.preventDefault();

        query = $(this).attr("data-uri");

        var direct_redirect = $("input[name=direct_redirect]").val();
        if(direct_redirect === "yes") {
            $("#domain-change-modal .modal-body").append("<div>Sie werden in <span id='cdown'>3</span> Sekunden automatisch weitergeleitet …</div>");

            var count = 3;
            var countdown = setInterval(function(){
                $("#cdown").html(count);
                if (count === 1) {
                    clearInterval(countdown);
                    $("#domain-change-trigger").trigger('click');
                }
                count--;
            }, 1000);

        }

        $("#domain-change-modal").modal("show");
        return false;
    })
    .on("click", "#domain-change-trigger", function(e) {
        var logged_in = $(this).attr("data-loggedin");
        if(logged_in === "1") {
            generateToken(query, this);
        } else {
            window.location.href = query;
        }

        return false;
    });

    function generateToken(url, obj = null) {
        var http_host            = $("input[name=http_host]").val();
        var trigger              = $(obj);

        if(trigger) {
            trigger.button("loading");
        }

        $.ajax({
            type: "POST",
            url: http_host + "/generate-token",
            data: {
                "domain_change_terms": $("input[name=domain_change_terms]").is(":checked") ? 1 : 0,
                "domain_change_agb": $("input[name=domain_change_agb]").is(":checked") ? 1 : 0,
                "domain_change_agb_2": $("input[name=domain_change_agb_2]").is(":checked") ? 1 : 0
            },
            success: function(data) {
                if(data.status === "ok") {
                    window.location.href = url;
                } else {
                    if(data.errors) {
                        $.each(data.errors, function(index) {
                            $("label[for=" + index + "]").css("color", "red");
                        });
                    }

                    if(trigger) {
                        trigger.button("reset");
                    }
                }
            }
        });
    }
});

