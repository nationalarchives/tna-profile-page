"use strict";

var stopSpamming = function (config) {
    // DOM selector
    var $profileEmail = $(config.emailSelector);
    // Pass the DOM to the text function
    var getProfileEmail = function getProfileEmail() {
        return $profileEmail.text();
    };
    // Get @ from email DOM
    var getPartFromEmail = function getPartFromEmail(getProfile) {
        if (!!getProfile && getProfile.indexOf('@') !== -1) {
            var atPos = getProfile.indexOf('@');
            return getProfile.substring(atPos + 1, -1);
        }
    };
    // Append DOM element
    var appendDOMElem = function appendDOMElem() {
        return $profileEmail.text(getPartFromEmail(getProfileEmail()));
    };
    // Concat elements
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

    return {/* silence is gold */};
}({ emailSelector: '.profile-contact span', domain: 'nationalarchives.gsi.gov.uk' });
//# sourceMappingURL=profile-page.js.map
