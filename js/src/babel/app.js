"use strict";

var stopSpamming = (function (config) {
    // DOM selector
    let $profileEmail = $(config.emailSelector);
    // Pass the DOM to the text function
    let getProfileEmail = () => $profileEmail.text();
    // Get @ from email
    let getPartFromEmail = (getProfile) => {
        if (!!getProfile && getProfile.indexOf('@') !== -1) {
            let atPos = getProfile.indexOf('@');
            return getProfile.substring(atPos + 1, -1);
        }
    };
    // Append DOM element
    let appendDOMElem = () => $profileEmail.text( getPartFromEmail( getProfileEmail() ) );
    // Concat elements
    let concatElem = () => appendDOMElem() + $profileEmail.append("<div class='pemail'>TNA</div>") + $profileEmail.append(config.domain);
    /**
     * Initialise the functions
     * */
    let init = () => { concatElem(); };
    // Call init
    init();

    return { /* silence is gold */ }
})({emailSelector: '.profile-contact span', domain: 'nationalarchives.gsi.gov.uk'});