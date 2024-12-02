<?php

//sanitise-input function
function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$errMsg ="";

//start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Validate first name
if (isset($_POST["First_Name"])) {
	$firstname = sanitise_input($_POST["First_Name"]);

	if($firstname == ""){
		$errMsg .= "<p class='errorMessage'>You must enter your first name.</p>";
	}  else if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
		$errMsg .= "<p class='errorMessage'>Only alpha letters allowed in your first name.</p>";
	}  else if (strlen($firstname) > 25){
		$errMsg .= "<p class='errorMessage'>Only a maximum of 25 characters allowed in your first name.</p>";
	} else {
		$_SESSION["first_name"] = $firstname;
	}
} else {
	header("location: enquire.php");
}


//Validate last name
if(isset($_POST["Last_Name"])){
	$lastname = sanitise_input($_POST["Last_Name"]);

	if($lastname == ""){
		$errMsg .= "<p class='errorMessage'>You must enter your last name.</p>";
	} else if (!preg_match("/^[a-zA-Z-]*$/",$lastname)) {
		$errMsg .= "<p class='errorMessage'>Only alpha letters or hypen allowed in your last name.</p>";
	} else if (strlen($lastname) > 25){
		$errMsg .= "<p class='errorMessage'>Only a maximum of 25 characters allowed in your last name.</p>";
	} else {
		$_SESSION["last_name"] = $lastname;
	}
} else {
	header("location: enquire.php");
}

// Validate email
if (isset($_POST["Email_address"])) {
    $email = sanitise_input($_POST["Email_address"]);

    if ($email == "") {
        $errMsg .= "<p class='errorMessage'>You must enter your email address.</p>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMsg .= "<p class='errorMessage'>Invalid email format.</p>";
    } else {
		$_SESSION["email"] = $email;
	}
} else {
	header("location: enquire.php");
}

//Validate Address as Street_Address, Suburb_Town, State, Postcode
// "^[a-zA-Z0-9,\s]+$"
if(isset($_POST["Street_Address"])){
	$streetAddress = sanitise_input($_POST["Street_Address"]);

	if($streetAddress == ""){
		$errMsg .= "<p class='errorMessage'>You must enter your street address.</p>";
	} else if (!preg_match("/^[a-zA-Z0-9\s]+$/",$streetAddress)) {
		$errMsg .= "<p class='errorMessage'>Only alpha letters, numbers or spaces allowed for street address.</p>";
	} else if (strlen($streetAddress) > 40){
		$errMsg .= "<p class='errorMessage'>Only a maximum of 40 characters allowed for your street address.</p>";
	} else {
		$_SESSION["street_address"] = $streetAddress;
	}
} else {
	header("location: enquire.php");
}


if(isset($_POST["Suburb_Town"])){
	$suburbTown = sanitise_input($_POST["Suburb_Town"]);

	if($suburbTown == ""){
		$errMsg .= "<p class='errorMessage'>You must enter your suburb or town.</p>";
	} else if (!preg_match("/^[a-zA-Z0-9\s]+$/",$suburbTown)) {
		$errMsg .= "<p class='errorMessage'>Only alpha letters, numbers or spaces allowed for suburb or Town.</p>";
	} else if (strlen($suburbTown) > 20){
		$errMsg .= "<p class='errorMessage'>Only a maximum of 20 characters allowed for suburb or town.</p>";
	} else {
		$_SESSION["suburb_town"] = $suburbTown;
	}
} else {
	header("location: enquire.php");
}

if(isset($_POST["State"])){
	$state = sanitise_input($_POST["State"]);

	if($state == ""){
		$errMsg .= "<p class='errorMessage'>You must select a state.</p>";
	} else {
		$_SESSION["state"] = $state;
	}
} else {
	header("location: enquire.php");
}


if(isset($_POST["Postcode"])){
	$postcode = sanitise_input($_POST["Postcode"]);

	if($postcode == ""){
		$errMsg .= "<p class='errorMessage'>You must enter your postcode.</p>";
	} else if (!preg_match("/^[0-9]{4}$/",$postcode)) {
		$errMsg .= "<p class='errorMessage'>Only exactly four numbers allowed for postcode.</p>";
	} else {
		$_SESSION["postcode"] = $postcode;
	}
} else {
	header("location: enquire.php");
}

//Validate Phone number as Phone_number

if(isset($_POST["Phone_number"])){
	$phoneNumber = sanitise_input($_POST["Phone_number"]);

	if($phoneNumber == ""){
		$errMsg .= "<p class='errorMessage'>Please enter your phone number.</p>";
	} else if (!preg_match("/^[0]{1}\s[0-9]{3}\s[0-9]{3}\s[0-9]{3}$/",$phoneNumber)) {
		$errMsg .= "<p class='errorMessage'>Please enter the number in the format like the space holder shows 0 xxx xxx xxx</p>";
	} else {
		$_SESSION["phone_number"] = $phoneNumber;
	}
} else {
	header("location: enquire.php");
}

//Validate Prefferred contact by (radio button): as Email, Phone or Post (name: preferred_contact)

if(isset ($_POST["preferred_contact"])){
	$preferredContact = sanitise_input($_POST["preferred_contact"]);
 
	if ($preferredContact == ""){
	$preferredContact = "Unknown preferred Contact";
	} else {
		$_SESSION["preferred_contact"] = $preferredContact;
	}
} else {
	header("location: enquire.php");
}


//Validate Product as Product (dropdown)

if(isset($_POST["Product"])){
	$product = sanitise_input($_POST["Product"]);

	if($product == ""){
		$errMsg .= "<p class='errorMessage'>Please select a product.</p>";
	} else {
		$_SESSION["product"] = $product;
	}
} else {
	header("location: enquire.php");
}


//Validate Product features as Storage, Colour (checkboxes)



if(isset($_POST["Storage"])){
	$storage = sanitise_input($_POST["Storage"]);

	if($storage == ""){
		$errMsg .= "<p class='errorMessage'>Please select the storage size of the product.</p>";
	} else {
		$_SESSION["product_features"] = $storage;
		$_SESSION["product_storage"] = $storage;
	}
} else {
	header("location: enquire.php");
}

if(isset($_POST["Colour"])){
	$colour = sanitise_input($_POST["Colour"]);

	if($colour == ""){
		$errMsg .= "<p class='errorMessage'>Please select the colour of the product.</p>";
	} else {
		$_SESSION["product_features"] = $_SESSION["product_features"] . ", " . $colour;
		$_SESSION["product_colour"] = $colour;
	}
} else {
	header("location: enquire.php");
}

//Validate Comment field 

if(isset($_POST["Comment"])){
	$comment = sanitise_input($_POST["Comment"]);

	if($comment == ""){
		$comment = "no comment";
	} else {
		$_SESSION["comment_field"] = $comment;
	}
} else {
	header("location: enquire.php");
}

//Validate Quantity as Quantity

if (isset($_POST["Quantity"])) {
	$quantity = sanitise_input($_POST["Quantity"]);

	if($quantity == ""){
		$errMsg .= "<p class='errorMessage'>You must enter the quantity.</p>";
	} else if ((!ctype_digit($quantity) && $quantity < 1)) {
		$errMsg .= "<p class='errorMessage'>Quantity must be a positive number</p>";
	} else if (($quantity <= 0)) {
		$errMsg .= "<p class='errorMessage'>Quantity must be a positive number</p>";
	} else {
		$_SESSION["product_quantity"] = $quantity;
	}
} else {
	header("location: enquire.php");
}


    // Cross-check the selected state with the entered postcode

if (isset($_POST["State"]) && isset($_POST["Postcode"])){

	$state = sanitise_input($_POST["State"]);
	$postcode = sanitise_input($_POST["Postcode"]);

    switch ($state) {
        case "VIC":
            if ($postcode[0] != "3" && $postcode[0] != "8") {
                $errMsg .= "<p class='errorMessage'>Postcode for VIC begins with 3 or 8</p>";
            }
            break;

        case "NSW":
            if ($postcode[0] != "1" && $postcode[0] != "2") {
                $errMsg .= "<p class='errorMessage'>Postcode for NSW begins with 1 or 2</p>";
            }
            break;

        case "QLD":
            if ($postcode[0] != "4" && $postcode[0] != "9") {
                $errMsg .= "<p class='errorMessage'>Postcode for QLD begins with 4 or 9</p>";
            }
            break;

        case "NT":
            if ($postcode[0] != "0") {
                $errMsg .= "<p class='errorMessage'>Postcode for NT begins with 0</p>";
            }
            break;

        case "WA":
            if ($postcode[0] != "6") {
                $errMsg .= "<p class='errorMessage'>Postcode for WA begins with 6</p>";
            }
            break;

        case "SA":
            if ($postcode[0] != "5") {
                $errMsg .= "<p class='errorMessage'>Postcode for SA begins with 5</p>";
            }
            break;

        case "TAS":
            if ($postcode[0] != "7") {
                $errMsg .= "<p class='errorMessage'>Postcode for TAS begins with 7</p>";
            }
            break;

        case "ACT":
            if ($postcode[0] != "0") {
                $errMsg .= "<p class='errorMessage'>Postcode for ACT begins with 0</p>";
            }
            break;

        default:
            break;
    }
} else {
	header("location: enquire.php");
}
} else {
	header("location: enquire.php");
}

if (empty($errMsg)) {

    // Retrieve the form data
    $selectedProduct = $_SESSION["product"];
    $selectedStorage = 	$_SESSION["product_storage"];
    $selectedColour = 	$_SESSION["product_colour"];
    $selectedQuantity = $_SESSION["product_quantity"];

    $price = 0;
    $selectionComplete = true;
    $quantityPositive = true;

    // Calculate product price
    switch($selectedProduct) {
        case "SONY PLAYSTATION VR2":
            $price += 800;
            break;

        case "META Quest 3":
            $price += 900;
            break;

        case "PICO 4 All-in-One":
            $price += 600;
            break;

        case "HTC XR Elite":
            $price += 1000;
            break;

        case "":
            $selectionComplete = false;
            break;

        default:
            break;
    }

    // Calculate storage price
    switch($selectedStorage) {
        case "128GB":
            // for future enhancements
            break;

        case "256GB":
            $price += 200;
            break;

        case "":
            $selectionComplete = false;
            break;

        default:
            break;
    }

    // Ensure a color is selected
    if ($selectedColour === "") {
        $selectionComplete = false;
    }

    // Check for valid quantity
    if (!empty($selectedQuantity) && $selectedQuantity > 0) {
        $price *= $selectedQuantity;
    } else if ($selectedQuantity < 1) {
        $quantityPositive = false;
    } else {
        $selectionComplete = false;
    }

    // Output price calculation result
    if ($selectionComplete && $quantityPositive) {
        // Save price to session and display the result
        $_SESSION['product_price'] = $price;
    } 
}


// Display any error messages
if (!empty($errMsg)) {
	echo '<h2 id="errorMessage">Error Messages:</h2>';
    echo $errMsg;
    session_unset();
    session_destroy();
}
?>