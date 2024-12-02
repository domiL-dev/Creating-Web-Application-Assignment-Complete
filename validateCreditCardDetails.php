<?php

//sanitise-input function
function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$errMsg ="";

session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Validate Credit Card Type
if (isset($_POST["Credit_card_type"])) {
	$typeCC = sanitise_input($_POST["Credit_card_type"]);

	if($typeCC == ""){
		$errMsg .= "<p class='errorMessage'>You must select the Credit Card Type.</p>";
	}  else if (isset($_POST["Credit_card_number"])) {

		$numberCC = sanitise_input($_POST["Credit_card_number"]);

		if($numberCC == ""){
			$errMsg .= "<p class='errorMessage'>You must enter the Credit Card number.</p>";
		}  else {
			$_SESSION["credit_card_type"] = $typeCC;
		}
		
		if (!preg_match("/^\d{15,16}$/", $numberCC)){
			$errMsg .= "<p class='errorMessage'>Only exactly 15 till 16 digigts allowed for Credit Card number.</p>";
		} else {
		switch ($typeCC) {
			case "Visa":
				if ($numberCC[0] != "4") {
					$errMsg .= "<p class='errorMessage'>VISA CC Number starts with 4!</p>";
				} else {
					$_SESSION["card_number"] = $numberCC;
				}
				break;
		
			case "MasterCard":
				if (!preg_match("/^(51|52|53|54|55)$/", substr($numberCC, 0, 2))) {
					$errMsg .= "<p class='errorMessage'>MasterCard CC Number starts with digits from 51-55!</p>";
				} else {
					$_SESSION["card_number"] = $numberCC;
				}
				break;
		
			case "American Express":
				if (substr($numberCC, 0, 2) != "34" && substr($numberCC, 0, 2) != "37") {
					$valid = false;
					$errMsg .= "<p class='errorMessage'>American Express CC Number starts with 34 or 37!</p>";
				} else {
					$_SESSION["card_number"] = $numberCC;
				}
				break;
		
			default:
				break;
		}
	}
}
} else {
	header("location: enquire.php");
}


//Validate Name on Credit Card
if(isset($_POST["Name_on_credit_card"])){
	$nameCC = sanitise_input($_POST["Name_on_credit_card"]);

	if($nameCC == ""){
		$errMsg .= "<p class='errorMessage'>You must enter your Name on your credit card.</p>";
	} else if (!preg_match("/^[a-zA-Z\s]+$/",$nameCC)) {
		$errMsg .= "<p class='errorMessage'>Only alpha letters or spaces allowed for Name on credit card.</p>";
	} else if (strlen($nameCC) > 40){
		$errMsg .= "<p class='errorMessage'>Only a maximum of 40 characters allowed for Name on credit card.</p>";
	} else {
		$_SESSION["name_on_credit_card"] = $nameCC;
	}
} else {
	header("location: enquire.php");
}

//Validate VCC
if(isset($_POST["expiry_date"])){
	$expiryCC = sanitise_input($_POST["expiry_date"]);

	if($expiryCC == ""){
		$errMsg .= "<p class='errorMessage'>You must enter the expiry date of the credit card.</p>";
	} else if (!preg_match("/(0[1-9]|1[0-2])-(2[0-9]|3[0-9])/",$expiryCC)) {
		$errMsg .= "<p class='errorMessage'>Only digits and hyphen allowed in the following format MM-YY expiry date of credit card.</p>";
	} else {
		$_SESSION["vcc"] = $expiryCC;
	}
} else {
	header("location: enquire.php");
}

//Validate CCV 
if(isset($_POST["CVV"])){
	$cvv = sanitise_input($_POST["CVV"]);

	if($cvv == ""){
		$errMsg .= "<p class='errorMessage'>You must enter the CVV of the credit card.</p>";
	} else if (!preg_match("/^\d{3}$/",$cvv)) {
		$errMsg .= "<p class='errorMessage'>Only exactly 3 digits allowed for CVV of credit card.</p>";
	} else {
		$_SESSION["cvv"] = $cvv;
	}
} else {
	header("location: enquire.php");
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