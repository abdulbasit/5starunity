$(document).ready(function(){
    // add open class to navbar when menu is collapsed
    $(document).ready(function(){
        $(".navbar-toggle").on("click", function(e){
            if ($("#bs-example-navbar-collapse-1").hasClass("in")) {
                $("nav.navbar").removeClass("navbar-open");
            }
            else {
                $("nav.navbar").addClass("navbar-open");
            }
        });   
    });
    // menu icon to x on collapse
    $('.navbar-toggle').click(function(){
        $(this).toggleClass('open');
    });
});
