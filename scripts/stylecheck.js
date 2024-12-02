/**
 * Author: Dominik Leibel 105323278
 * Target: payment.html
 * Purpose: This file is for Assignment 2 
 * Created: 22.09.24
 * Last updated: 22.09.24
 * Credits: ...
 */

"use strict";

function DragDrop(image) {

    //creating and initializing variables to represent the img position with coordinates as a number
    var x_img = Number(image.style.left.replace('px', ''));
    var y_img = Number(image.style.top.replace('px', ''));

    //create variables for the starting coords of the mouse so that the Eventlistender "dragend" has access to values
    var mouseStartX, mouseStartY;

    //Eventlistener is triggerd by starting dragging an img
    image.addEventListener('dragstart', function(e1) {
            mouseStartX = e1.clientX;
            mouseStartY = e1.clientY;

    })

    //Eventlistender is triggerd by ending dragging an img
    image.addEventListener('dragend', (e2) => {

        image.style.left = x_img + (e2.clientX - mouseStartX) + "px";
        image.style.top = y_img + (e2.clientY - mouseStartY) + "px";
        x_img = Number(image.style.left.replace('px', ''));
        y_img = Number(image.style.top.replace('px', ''));

    })

}

//function to resize the Images to fit on the head values from inputs of type number
function resizeImage(){
    var images = document.getElementsByClassName("imgHeadset");
    var newWidth = document.getElementById("widthInput").value;

    //iterating through the 2 images to resize both
    for (var i = 0; i < images.length; i++) {
   
        if (newWidth) {
            images[i].style.width = newWidth + "px";
        }
    }
}



function init() {

    //initializing general variables
    var Headset_1 = document.getElementById("Headset_1");
    Headset_1.style.left = "10px";
    Headset_1.style.top = "10px";
    var Headset_2 = document.getElementById("Headset_2");
    Headset_2.style.left = "220px";
    Headset_2.style.top = "10px";

    //calling DragDrop() to add Eventlisteners for Headset 1 and 2
    DragDrop(Headset_1);
    DragDrop(Headset_2);

    //initalizing general variable
    var resizeButton = document.getElementById("resizeButton");

    //calling resizeImage() when clicke on resizeButton
    resizeButton.onclick = function(){
        resizeImage();
        return true;
    }
    
}

window.onload = init;