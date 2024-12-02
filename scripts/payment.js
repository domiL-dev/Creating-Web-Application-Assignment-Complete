/**
 * Author: Dominik Leibel 105323278
 * Target: payment.html
 * Purpose: This file is for Assignment 2 
 * Created: 03.09.24
 * Last updated: 03.09.24
 * Credits: ...
 */

"use strict";

//Display the transfered Data from enquire.html to payment.html
function displayEnquireInformation(){
    //create variables for displaying transfered data from enquire page
    var customerName = document.getElementById("Name");
    var customerEmailAddress = document.getElementById("EmailAddress");
    var customerPhoneNumber = document.getElementById("PhoneNumber");
    var customerWayOfContact = document.getElementById("WayOfContact");
    var customerStreetAddress = document.getElementById("StreetAddress");
    var customerSuburbTown = document.getElementById("SuburbTown");
    var customerState = document.getElementById("State");
    var customerPostcode = document.getElementById("Postcode");
    var selectedProduct = document.getElementById("Product");
    var selectedStorage = document.getElementById("Storage");
    var selectedColour = document.getElementById("Colour");
    var selectedQuantity = document.getElementById("Quantity");
    var productPrice = document.getElementById("Price");
    var enquireComment = document.getElementById("Comment");

    //creating variables for submitting transfered data from enquire page to server
    var formName = document.getElementById("formName");
    var formEmailAddress = document.getElementById("formEmailAddress");
    var formPhoneNumber = document.getElementById("formPhoneNumber");
    var formWayOfContact = document.getElementById("formWayOfContact");
    var formStreetAddress = document.getElementById("formStreetAddress");
    var formSuburbTown = document.getElementById("formSuburbTown");
    var formState = document.getElementById("formState");
    var formPostcode = document.getElementById("formPostcode");
    var formProduct = document.getElementById("formProduct");
    var formStorage = document.getElementById("formStorage");
    var formColour = document.getElementById("formColour");
    var formQuantity = document.getElementById("formQuantity");
    var formPrice = document.getElementById("formPrice");
    var formComment = document.getElementById("formComment");
    

    //If else statements for displaying the transfered data

    if(sessionStorage.customerFirstName && sessionStorage.customerLastName){
        customerName.textContent = sessionStorage.customerFirstName + " " +sessionStorage.customerLastName;
        formName.value = sessionStorage.customerFirstName + " " +sessionStorage.customerLastName;
    } else {
        customerName.textContent = "no data";
    }

    if(sessionStorage.customerEmailAddress){
        customerEmailAddress.textContent = sessionStorage.customerEmailAddress;
        formEmailAddress.value = sessionStorage.customerEmailAddress;
        } else {
             customerEmailAddress.textContent = "no data";
         }

    if(sessionStorage.customerPhoneNumber){
        customerPhoneNumber.textContent = sessionStorage.customerPhoneNumber;
        formPhoneNumber.value = sessionStorage.customerPhoneNumber;
         } else {
             customerPhoneNumber.textContent = "no data";
         }

    if(sessionStorage.preferredWayOfContact){
        customerWayOfContact.textContent = sessionStorage.preferredWayOfContact;
        formWayOfContact.value = sessionStorage.preferredWayOfContact;
         } else {
            customerWayOfContact.textContent = "no data";
         }

    if(sessionStorage.customerStreetAddress){
        customerStreetAddress.textContent = sessionStorage.customerStreetAddress;
        formStreetAddress.value = sessionStorage.customerStreetAddress;
         } else {
             customerStreetAddress.textContent = "no data";
         }

    if(sessionStorage.customerSuburbTown){
        customerSuburbTown.textContent = sessionStorage.customerSuburbTown;
        formSuburbTown.value = sessionStorage.customerSuburbTown;
         } else {
             customerSuburbTown.textContent = "no data";
         }
    
    if(sessionStorage.customerState){
        customerState.textContent = sessionStorage.customerState;
        formState.value = sessionStorage.customerState;
         } else {
             customerState.textContent = "no data";
         }

    if(sessionStorage.customerPostcode){
        customerPostcode.textContent = sessionStorage.customerPostcode;
        formPostcode.value = sessionStorage.customerPostcode;
         } else {
             customerPostcode.textContent = "no data";
         }

    if(sessionStorage.selectedProduct){
        selectedProduct.textContent = sessionStorage.selectedProduct;
        formProduct.value = sessionStorage.selectedProduct;
         } else {
             selectedProduct.textContent = "no data";
         }

    if(sessionStorage.selectedStorage){
        selectedStorage.textContent = sessionStorage.selectedStorage;
        formStorage.value = sessionStorage.selectedStorage;
         } else {
             selectedStorage.textContent = "no data";
         }
        
    if(sessionStorage.selectedColour){
        selectedColour.textContent = sessionStorage.selectedColour;
        formColour.value = sessionStorage.selectedColour;
         } else {
             selectedColour.textContent = "no data";
         }

    if(sessionStorage.selectedQuantity){
        selectedQuantity.textContent = sessionStorage.selectedQuantity;
        formQuantity.value = sessionStorage.selectedQuantity;
         } else {
             selectedQuantity.textContent = "no data";
         }

    if(sessionStorage.productPrice){
        productPrice.textContent = sessionStorage.productPrice;
        formPrice.value = sessionStorage.productPrice;
         } else {
             productPrice.textContent = "no data";
         }

    if(sessionStorage.enquireComment){
        enquireComment.textContent = sessionStorage.enquireComment;
        formComment.value = sessionStorage.enquireComment;
         } else {
             enquireComment.textContent = "no data";
         }

}


//Function to validate input
function validate(){

    var novaildate = true; // set true to disable function

    // initialize general local variables----------------------------------------
    var errorMessage = "";
    var valid = true;

    if(!novaildate){

    var selectedType = document.getElementById("cc_type").value;
    var enteredName = document.getElementById("name_on_cc").value;
    var enteredNumber = document.getElementById("cc_number").value;
    var enteredExpiryDate = document.getElementById("expiry_date").value;
    var enteredCvv = document.getElementById("cvv").value;


    
    // validate Creditcard informations--------------------------------------------
    if (selectedType !== "Visa" && selectedType !== "MasterCard" && selectedType !== "American Express"){
        valid = false;
        errorMessage = errorMessage + "Please select a Credit Card Type!";
    }

    if (!enteredName.match(/^[a-zA-Z\s]{1,40}$/)){
        valid = false;
        errorMessage = errorMessage + "\nPlease enter your real Name!";
    }

    if (!enteredNumber.match(/^\d{15,16}$/)){
        valid = false;
        errorMessage = errorMessage + "\nCredit Card Number invalid!";
    }

    switch(selectedType){
        case "Visa":
            if(enteredNumber[0] != "4")  {
                valid = false;
                errorMessage = errorMessage + "\n VISA CC Number starts with 4!";
            }
            break;

        case "MasterCard":
            if(!enteredNumber.substring(0, 2).match(/^(51|52|53|54|55)$/))  {
                valid = false;
                errorMessage = errorMessage + "\n MasterCard CC Number starts with first digits from 51-55!";
            }
            break;

        case "American Express":
            if(enteredNumber.substring(0, 2) != "34" && enteredNumber.substring(0, 2) != "37")  {
                valid = false;
                errorMessage = errorMessage + "\n American Express CC Number starts with 34 or 37";
            }
            break;
        
        default:
            break;
    }

    if(!enteredExpiryDate.match(/(0[1-9]|1[0-2])-(2[0-9])/)){
        valid = false;
        errorMessage = errorMessage + "\nExpiry Date invalid!";
    }

    if (!enteredCvv.match(/^\d{3}$/)){
        valid = false;
        errorMessage = errorMessage + "\nCVV invalid!";
    }

    //display error message
    if(errorMessage != ""){
        alert(errorMessage);
    }

}//close novalidate if-block

    return valid;

}


//Enhancement Timer on payment.html----------------------------------------------------------------------

//set time Left 300seconds are 5 minutes
var timeLeft = 300;


function formatTime(seconds) {
    //seconds left divided by 60 represents the minutes left
    var minutes = Math.floor(seconds / 60);

    //with modolo operator we get the seconds left of the whole minutes
    var secondsLeft = seconds % 60;

    //using padStart() for format xx : xx if the minutes or seconds are < 10 then a zero is added to the beginning
    var strMinutes = minutes.toString().padStart(2, "0");
    var strSecondes = secondsLeft.toString().padStart(2, "0");

    return strMinutes + ":" + strSecondes;
}

//Function to start Timer
function startTimer() {
    var timerDisplay = document.getElementById("timer");
    
    //setInterval() https://www.w3schools.com/Jsref/met_win_setinterval.asp
    var timerInterval = setInterval(function() {
        //subtract 1 from timeLeft
        timeLeft--;

        //update the displayed time
        timerDisplay.textContent = formatTime(timeLeft);

        //Check if the timer has reached zero
        if (timeLeft <= 0) {
            alert("Your session has expired. You are redirected to the Homepage!");
            clearInterval(timerInterval);
            sessionStorage.clear();
            window.location.href = "index.html";

        }
    }, 1000);
}

function init() {

    startTimer();

    displayEnquireInformation();
    
    var cancelOrder = document.getElementById("cancelorder");
    
    cancelOrder.onclick = function() {
        sessionStorage.clear();
        window.location.href = "index.html";
        return true;
    }

    var form = document.getElementById("paymentForm");

    form.addEventListener("submit", function(e) {

        if(!validate()){
            alert("Your form was not submitted. Please review your details.");
            e.preventDefault(); 
        }
    })
}

window.onload = init;