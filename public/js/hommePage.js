// please note, 
    // that IE11 now returns undefined again for window.chrome
    // and new Opera 30 outputs true for window.chrome
    // but needs to check if window.opr is not undefined
    // and new IE Edge outputs to true now for window.chrome
    // and if not iOS Chrome check
    // so use the below updated condition
    var isChromium = window.chrome;
    var winNav = window.navigator;
    var vendorName = winNav.vendor;
    var isOpera = typeof window.opr !== "undefined";
    var isIEedge = winNav.userAgent.indexOf("Edge") > -1;
    var isIOSChrome = winNav.userAgent.match("CriOS");

    if (isIOSChrome) {
        // is Google Chrome on IOS
    } else if (
        isChromium !== null &&
        typeof isChromium !== "undefined" &&
        vendorName === "Google Inc." &&
        isOpera === false &&
        isIEedge === false
    ) {
        // is Google Chrome
        function myFunction() {
            var r = confirm("Attention vous allez quitter l’application pour ouvrir l’application « mot de passe »");
            if (r == true) {
                location.replace("http://mot-de-passe/");
            } else {}
        }
    } else {
        function myFunction() {
            var r = confirm("Attention vous allez quitter l’application pour ouvrir l’application « mot de passe »");
            if (r == true) {
                location.replace("http://mot-de-passe/");
            } else {}
        }
    }
    $(document).ready(function () {
        $(".alertDismissible").fadeTo(2000, 500).slideUp(500, function () {
            $(".alertDismissible").slideUp(600);
        });
    })
    "use strict";