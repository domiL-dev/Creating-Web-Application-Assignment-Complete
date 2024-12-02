/**
 * Author: Dominik Leibel 105323278
 * Target: payment.html
 * Purpose: This file is for Assignment 2 
 * Created: 22.09.24
 * Last updated: 22.09.24
 * Credits: ...
 */

"use strict";

//opening an extra window for the Style Checker
function openSmallWindow() {
    window.open('stylecheck.html', 'newWindow', 'width=600,height=800');
}

function init() {

    //initializing general variables
    var styleCheck = document.getElementById("styleCheck_button");
    
    styleCheck.onclick = function() {
        openSmallWindow();
        return true;
    }


}

window.onload = init;