$(
    "header .overlay .header-content .navbar-nav .nav-item .nav-link[href^='#']"
).on("click", function (e) {
    // prevent default anchor click behavior
    e.preventDefault();

    // store hash
    var hash = this.hash;

    // animate
    $("html, body").animate(
        {
            scrollTop: $(hash).offset().top - 130,
        },
        1000
    );
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $(".navbar").addClass("fixed");
    } else {
        $(".navbar").removeClass("fixed");
    }
});
$(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $("#top").addClass("down");
    } else {
        $("#top").removeClass("down");
    }
});
$("#top").on("click", function () {
    $("html, body").animate(
        {
            scrollTop: 0,
        },
        1000
    );
});
