/**
 * Author: Dominik Leibel 105323278
 * Target: payment.html
 * Purpose: This file is for Assignment 2 
 * Created: 03.09.24
 * Last updated: 03.09.24
 * Credits: ...
 */

"use strict";


//validate input -------------------------------------
function validate(){

    var novalidate = true; // set true to disable function

    // initialize general local variables
    var errorMessage = "";
    var valid = true;

    if(!novalidate){
    // validate quantity selection
    var selectedQuantity = document.getElementById("Quantity").value;

    

    if (selectedQuantity == ""){
        valid = false;
        errorMessage = errorMessage + "Quantity of product not selected!";
    }

    if(selectedQuantity < 1){
        valid = false;
        errorMessage = errorMessage + "The selected quantity must be greater than 0!";
    }

    //validate postcode
    var selectedState = document.getElementById("State").value;
    var enteredPostcode = document.getElementById("Postcode").value;


//Cross Check Selected State with entered Postcode ------------------------------
    switch(selectedState){
        case "VIC":
            if(enteredPostcode[0] != "3" && enteredPostcode[0] != "8")  {
                valid = false;
                errorMessage = errorMessage + "\n Postcode for VIC begins with 3 or 8";
            }
            break;

        case "NSW":
            if(enteredPostcode[0] != "1" && enteredPostcode[0] != "2"){
                valid = false;
                errorMessage = errorMessage + "\n Postcode for NSW begins with 1 or 2";
            }
            break;
        
        case "QLD":
            if(enteredPostcode[0] != "4" && enteredPostcode[0] != "9"){
                valid = false;
                errorMessage = errorMessage + "\n Postcode for QLD begins with 4 or 9";
            }
            break;

        case "NT":
            if(enteredPostcode[0] != "0"){
                valid = false;
                errorMessage = errorMessage + "\n Postcode for NT begins with 0";
            }
            break;

        case "WA":
            if(enteredPostcode[0] != "6"){
                valid = false;
                errorMessage = errorMessage + "\n Postcode for WA begins with 6";
            }
            break;

        case "SA":
            if(enteredPostcode[0] != "5"){
                valid = false;
                errorMessage = errorMessage + "\n Postcode for SA begins with 5";
            }
            break;

        case "TAS":
            if(enteredPostcode[0] != "7"){
                valid = false;
                errorMessage = errorMessage + "\n Postcode for TAS begins with 7";
            }
            break;

        case "ACT":
            if(enteredPostcode[0] != "0"){
                valid = false;
                errorMessage = errorMessage + "\n Postcode for ACT begins with 0";
            }
            break;

        default:
            break;
    }



    //display error message
    if(errorMessage != ""){
        alert(errorMessage);
    }

}//close novaildate if-block

    return valid;
}

//Calculating Price dependent on selected options and value
function calcPrice(){
    var selectedProduct = document.getElementById("Product").value;
    var selectedStorage = document.getElementById("Storage").value;
    var selectedColour = document.getElementById("Colour").value;
    var selectedQuantity = document.getElementById("Quantity").value;

    var priceCalculated = document.getElementById(priceCalc);

    var price = 0;

    var selectionComplete = true;

    var quantityPositve = true;


    switch(selectedProduct) {
        case "SONY PLAYSTATION VR2" :

            price += 800;

          break;

        case "META Quest 3":

            price += 900;

          break;

        case "PICO 4 All-in-One":
            
            price += 600;

          break;

        case "HTC XR Elite":
            
            price += 1000;
          break;

        case "":
          selectionComplete = false;
          break;

        default:
            break;
      }

      switch(selectedStorage) {
        case "128GB":
        // for future enhancements
            break; 

        case "256GB":

            price += 200;
            break;

        case "":
            selectionComplete = false;
            break;
        
        default:
            break;
        
      }

      switch(selectedColour) {
        case "":
            selectionComplete = false;
            break;
        
        default:
            break;
      }

     if (selectedQuantity != null && selectedQuantity > 0)
        {
            price *= selectedQuantity;

        } else if (selectedQuantity < 1){
        quantityPositve = false;

        } else{
        selectionComplete = false;
        }



    if( selectionComplete && quantityPositve)
        {
            priceCalc.textContent = price + "$";
            //Store data directly in function
            sessionStorage.productPrice = price + "$";

        } else if (!quantityPositve){
            priceCalc.textContent = "Quantity should be greater than zero";
        }
        else {priceCalc.textContent = "please select at least one product"; }
}

//helper function to check wich preffered contact was selected and safe preffered contact in sessionstorage if selected
function storePreferredContact() {

    const selectedRadio = document.querySelector('input[name="preferred_contact"]:checked');
    
    if (selectedRadio) {
        const preferredContact = selectedRadio.value;
        sessionStorage.preferredWayOfContact = preferredContact;
    } else {
        console.log("No contact method selected.");
    }
}


//store Data in sessionStorage for transferring to payment.html
function storeData(){

    //Store Contact information
    sessionStorage.customerFirstName = document.getElementById("First_Name").value;
    sessionStorage.customerLastName = document.getElementById("Last_Name").value;
    sessionStorage.customerEmailAddress = document.getElementById("Email_address").value;
    sessionStorage.customerPhoneNumber = document.getElementById("Phone_number").value;

    //helper function to store radio button selection for the preffered way of contact
    var contactOptions = document.getElementsByName("preferred_contact");
    for (var i = 0; i < contactOptions.length; i++) {
        if (contactOptions[i].checked) {
            sessionStorage.preferredWayOfContact = contactOptions[i].value;
            break;
        }
    }

    //Store Address information
    sessionStorage.customerStreetAddress = document.getElementById("Street_Address").value;
    sessionStorage.customerSuburbTown = document.getElementById("Suburb_Town").value;
    sessionStorage.customerState = document.getElementById("State").value;
    sessionStorage.customerPostcode = document.getElementById("Postcode").value;

    //Product information
    sessionStorage.selectedProduct = document.getElementById("Product").value;
    sessionStorage.selectedStorage = document.getElementById("Storage").value;
    sessionStorage.selectedColour = document.getElementById("Colour").value;
    sessionStorage.selectedQuantity = document.getElementById("Quantity").value;
    //Price is stored in session Storage right after calculation in calcPrice()

    //Comment
    sessionStorage.enquireComment = document.getElementById("Comment").value;

}



function init() {
    

    var calculatePrice = document.getElementById("priceButton");

    calculatePrice.onclick = calcPrice;



    var form = document.getElementById("form");


    form.addEventListener("submit", function(e) { storeData();});

    /*
    form.addEventListener("submit", function(e) {

        if(!validate()){
            alert("Your form was not submitted. Please review your details.");
            e.preventDefault(); 

        } else{
            calcPrice();
            storeData();
            window.open("payment.html");

        }

    });*/

}

window.onload = init;
