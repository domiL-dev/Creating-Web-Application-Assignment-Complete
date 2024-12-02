<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Produt Payment"/>
        <meta name="keywords"    content="Payment" />
        <meta name="author"      content="Dominik Leibel" />
        <title>Product Payment</title>

        <link href="styles/style.css" rel="stylesheet"/>



      <!-- <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-eval';"> -->


    </head>

    <body>

        
        <h1>Product Payment</h1>

        <?php

    //when going bakc from process_order when for example an error occured there were a problem with submittin the formular again
    // to solve the problem the Validation of the form input from enquire.php is prevented from executin when going back from process_order.php
        session_start();


        if(isset($_SESSION["process_order_failed"]) && $_SESSION["process_order_failed"]){
            $_SESSION["process_order_failed"] = false;

        } else {
            include("validatePayment.php");
        }
        


        // just display table and form when there are no error messages
        if (empty($errMsg)) {
            //gett session variables for table

            if(isset($_SESSION["product_price"])){
                $product_price = $_SESSION["product_price"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["first_name"])){
                $first_name = $_SESSION["first_name"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["last_name"])){
                $last_name = $_SESSION["last_name"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["email"])){
                $email = $_SESSION["email"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["street_address"])){
                $street_address = $_SESSION["street_address"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["suburb_town"])){
                $suburb_town = $_SESSION["suburb_town"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["state"])){
                $state = $_SESSION["state"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["postcode"])){
                $postcode = $_SESSION["postcode"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["phone_number"])){
                $phone_number = $_SESSION["phone_number"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["preferred_contact"])){
                $preferred_contact = $_SESSION["preferred_contact"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["product"])){
                $product = $_SESSION["product"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["product_features"])){
                $product_features = $_SESSION["product_features"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["comment_field"])){
                $comment_field = $_SESSION["comment_field"];
                }else{
                    header("location: enquire.php");
                }
        
                if(isset($_SESSION["product_quantity"])){
                $product_quantity = $_SESSION["product_quantity"];
                }else{
                    header("location: enquire.php");
                }

            echo "

        <div id='timerContainer'>
            <p>Please complete the payment within the next:</p>
            <div id='timer'>05:00</div> <!-- Timer starts from 5 minutes -->
        </div>



        <!-- Get data from php session -->

        
                <!--Table containing data transfered from enquire.html-->
        <table id='dataTransfered'>
            <tr>
                <td>Name:</td>
                <td>$first_name $last_name</td>
            </tr>

            <tr>
                <td>Email Address:</td>
                <td>$email</td>
            </tr>

            <tr>
                <td>Phone number:</td>
                <td>$phone_number</td>
            </tr>

            <tr>
                <td>Way of Contact:</td>
                <td>$preferred_contact</td>
            </tr>

            <tr>
                <td>Street Address:</td>
                <td>$street_address</td>
            </tr>

            <tr>
                <td>Suburb/ Town:</td>
                <td>$suburb_town</span></td>
            </tr>

            <tr>
                <td>State:</td>
                <td>$state</td>
            </tr>

            <tr>
                <td>Postcode:</td>
                <td>$postcode</td>
            </tr>

            <tr>
                <td>Product:</td>
                <td>$product</td>
            </tr>

            <tr>
                <td>Features:</td>
                <td>$product_features</td>
            </tr>

            <tr>
                <td>Quantity:</td>
                <td>$product_quantity</td>
            </tr>

            <tr>
                <td>Price:</td>
                <td>$product_price $</td>
            </tr>
            
            <tr>
                <td>Comment:</td>
                <td>$comment_field</td>
            </tr>

        </table>


    
        


        <!--Form for Payment Details-->
        <form id='paymentForm' novalidate='novalidate'  method='post' action='process_order.php'>
            


            <fieldset id='payment_information'>
                <legend>Payment information</legend>

            <!--Input for Credit Card Information-->
            <label for='cc_type'>Credit card type</label>
                <select name='Credit card type' id='cc_type' class='select_option' >
                    <option value='' selected='selected'>Please Select a credit card type</option>
                    <option value='Visa' >Visa</option>
                    <option value='MasterCard' >MasterCard</option>
                    <option value='American Express' >American Express</option>
                </select>

                <p>
                    <label for='name_on_cc'>Name on credit card</label> 
                    <input type='text' name= 'Name on credit card' id='name_on_cc'  size='20' title='Name on credit card'>   
                </p>

                <p>
                    <label for='cc_number'>Credit card number</label> 
                    <input type='text' name= 'Credit card number' id='cc_number'  size='20'  title='Please Enter Credit Card number' >
                </p>
    

    
                <p>
                    <label for='expiry_date'>expiry date</label> 
                    <input type='text' name='expiry date' id='expiry_date' maxlength='5' size='5'  placeholder='MM-YY' title='please enter the expiry date in the format mm-yy '>
                </p>
            
                <p>
                    <label for='cvv'>CVV</label> 
                    <input type='text' name='CVV' id='cvv' maxlength='3' size='2' placeholder='xxx' title='please enter the Card verification value (CVV) '>
                </p>
            </fieldset>

            <input type='submit' value='Check-Out'>
            <input type='reset' value='Reset form'>
            <input type='reset' id='cancelorder' value='Cancel Order'>

        </form>";
        } else {
            echo '<p><button onclick="window.history.back()">Go Back</button></p>';
        }

        include_once("footer.inc")
?>



        <script src="scripts/payment.js"></script>

    </body>

</html>