/**
 * To show off JS works and can be integrated.
 */
(function() {
    "use strict";

    var flashForestMain = document.getElementsByClassName("flash-forest-main")[0];
    var flashForestSub = document.getElementsByClassName("flash-forest-sub")[0];

    changeImageSize();
    window.onresize = changeImageSize;
    window.onscroll = showLinkToTop;


    /**
     * Change image size based on the current width of the browser window.
     */

    function changeImageSize() {
        var pathStartMain = "img/minimalistic/flash/";
        var pathStartSub = "../" + pathStartMain;
        var pathEnd = ".jpg";

        if (window.innerWidth >= 700) {
            if (flashForestMain) {
                flashForestMain.src = pathStartMain + "flash-forest-desktop" + pathEnd;
            } else if (flashForestSub) {
                flashForestSub.src = pathStartSub + "flash-forest-desktop" + pathEnd;
            }
        } else {
            if (flashForestMain) {
                flashForestMain.src = pathStartMain + "flash-forest-mobile" + pathEnd;
            } else if (flashForestSub) {
                flashForestSub.src = pathStartSub + "flash-forest-mobile" + pathEnd;
            }
        }
    }


    /**
     * Hide the link to top button when the top of the page is
     * displayed.
     */

    function showLinkToTop() {
        var currentScrollPos = window.pageYOffset;
        var linkToTop = document.getElementById("link-to-top-page");

        if (currentScrollPos > 0) {
            linkToTop.style.display = "inline-block";
        } else {
            linkToTop.style.display = "none";
        }
    }
})();
