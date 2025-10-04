jQuery(document).ready(function($) {
    $(".nav-tab").click(function() {
        $(".nav-tab").removeClass("nav-tab-active");
        $(this).addClass("nav-tab-active");

        $(".tab-content").hide();
        $($(this).attr("href")).show();
        return false;
    });

    $(".nav-tab-active").trigger("click");
});
