"use strict";
var consoleLog = (function () {
    console.log("%c The National Archives " + "%c Profile Page" + "%c is enabled", "color:red;", "color:black", "color:blue");
})();

var stopSpamming = (function (config) {
    let $profileEmail = $(config.emailSelector);

    let getProfileEmail = function () {
        return $profileEmail.html();
    };

    let getPartFromEmail = function(){
        if(getProfileEmail().indexOf('@') !== -1) {
            let atPos = getProfileEmail().indexOf('@');
            return getProfileEmail().substring(atPos + 1, - 1);
        }
    };

    let appendDOMElem = function (){
        return $profileEmail.html(getPartFromEmail());
    };

    let concatElem =  function () {
        return appendDOMElem() + $profileEmail.append("<div class='pemail'>TNA</div>") + $profileEmail.append(config.domain);
    };
    /**
     * Initialise the functions
     * */
    let init = function(){
        concatElem();
    };
    // Call init
    init();

    return {
        /* silence is gold */
    }
})({emailSelector: '.profile-contact span', domain: 'nationalarchives.gov.uk'});