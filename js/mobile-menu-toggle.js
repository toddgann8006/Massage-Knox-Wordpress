// hide or display the mobile menu

/* let's consider we want to toggle the menu displayed at 800 screen width, here's what we need to do (you can accordingly replace 800 with to a screen width you would need)..*/
function toggle() {
    if (jQuery(window).width() >= 800) {
        jQuery('.nav.mobile-menu').hide();
        jQuery('.nav.desktop-menu').show();
    } else {
        jQuery('.nav.desktop-menu').hide();
        jQuery('.nav.mobile-menu').show();
    }
}

// on page load set the menu display initially
toggle();

// toggle the menu display on browser resize
jQuery(window).resize(function () {
    toggle();
});