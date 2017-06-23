"use strict";

var consoleLog = function () {
    console.log("%c The National Archives " + "%c Profile Page" + "%c is enabled", "color:red;", "color:black", "color:blue");
}();

var stopSpamming = function (config) {
    var $profileEmail = $(config.emailSelector);

    var getProfileEmail = function getProfileEmail() {
        return $profileEmail.html();
    };

    var getPartFromEmail = function getPartFromEmail() {
        if (getProfileEmail().indexOf('@') !== -1) {
            var atPos = getProfileEmail().indexOf('@');
            return getProfileEmail().substring(atPos + 1, -1);
        }
    };

    var appendDOMElem = function appendDOMElem() {
        return $profileEmail.html(getPartFromEmail());
    };

    var concatElem = function concatElem() {
        return appendDOMElem() + $profileEmail.append("<div class='pemail'>TNA</div>") + $profileEmail.append(config.domain);
    };
    /**
     * Initialise the functions
     * */
    var init = function init() {
        concatElem();
    };
    // Call init
    init();

    return {
        /* silence is gold */
    };
}({ emailSelector: '.profile-contact span', domain: 'nationalarchives.gov.uk' });
//# sourceMappingURL=profile-page.js.map
