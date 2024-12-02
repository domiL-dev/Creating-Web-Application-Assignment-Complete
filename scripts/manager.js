/**
 * Author: Dominik Leibel 105323278
 * Target: payment.html
 * Purpose: This file is for Assignment 3
 * Created: 19.10.24
 * Last updated: 19.10.24
 * Credits: ...
 */

"use strict";

        // Function to check which radio button is selected
        function checkRadioSelection(allOrdersRadio, customOrdersRadio,customQueryForm) {
            if (customOrdersRadio.checked) {
                customQueryForm.style.display = 'block';  // Show form
                allOrdersRadio.value = unchecke;
            } else if (allOrdersRadio) {
                customQueryForm.style.display = 'none';  // Hide form
            }
        }


function init() {

  
        // Get radio buttons and form
        var allOrdersRadio = document.getElementById('allOrders');
        var customOrdersRadio = document.getElementById('customOrders');
        var customQueryForm = document.getElementById('customQuery');
    

    
        // Add event listeners to both radio buttons
        allOrdersRadio.addEventListener('change', function(){
            checkRadioSelection(allOrdersRadio, customOrdersRadio,customQueryForm);
        });

        customOrdersRadio.addEventListener('change', function(){
            checkRadioSelection(allOrdersRadio, customOrdersRadio,customQueryForm);
        });
    
        // Initial check in case a radio button is preselected
        checkRadioSelection();
    ;

}

window.onload = init;