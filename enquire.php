<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Produt Enquire"/>
        <meta name="keywords"    content="Details, Product Enquire" />
        <meta name="author"      content="Dominik Leibel" />
        <title>Product Enquire</title>

        <link href="styles/style.css" rel="stylesheet"/>

        <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-eval';">


    </head>

<body>
    
    <header>
        <?php
        include_once("header.inc");
        include_once("menu.inc");
        ?>
      </header>

      <h2>Make a product enquire:</h2>

<!--<form method="get" action="payment.html" novalidate>-->
<form id="form" novalidate="novalidate" method="post" action="payment.php">

    <!--Contact information-->
    <fieldset id="Contact_information">
        <legend>Conact information:</legend>
           
            <p>
                <label for="First_Name">First Name</label> 
                <input type="text" name= "First Name" id="First_Name" maxlength="25" size="10" pattern="^[a-zA-Z]+$"  title="only alphabetical characters allowed, max 25" required="required">
                
            </p>

            <p>
                <label for="Last_Name">Last Name</label> 
                <input type="text" name= "Last Name" id="Last_Name" maxlength="25" size="10" pattern="^[a-zA-Z]+$" title="only alphabetical characters allowed, max 25 chars" required="required">   
            </p>

            <p>
                <label for="Email_address">Email address</label> 
                <input type="email" name="Email address" id="Email_address" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="please enter a valid email address " required="required">
            </p>

            <p>
                <label for="Phone_number">Phone number</label>
                <input type="text" name= "Phone number" id="Phone_number" maxlength="13" size="12" pattern="^[0]{1}\s[0-9]{3}\s[0-9]{3}\s[0-9]{3}$" placeholder="0 XXX XXX XXX" title="please enter a valid Phone number, 10 digits" required="required">
            </p>

        <!--Preferred way for contact-->
        <fieldset id="preferred_contact">
            <legend>Preferred contact by:</legend>
            <p>
                <label for="Email">Email</label>
                <input type="radio" name="preferred_contact" id="Email" value="Email" checked="checked">
            
                <label for="Phone">Phone</label>
                <input type="radio" name="preferred_contact" id="Phone" value="Phone">
            
                <label for="Post">Post</label>
                <input type="radio" name="preferred_contact" id="Post" value="Post">
            </p>
        </fieldset>
    </fieldset>

            <!--Adress-->
            <fieldset id="Address">
                <legend>Address</legend>
                <p>
                    <label for="Street_Address">Street Address</label> 
                    <input type="text" name= "Street Address" id="Street_Address" maxlength="40" size="45" pattern="^[a-zA-Z0-9,\s]+$" title="please enter a valid street address, max 40 chars" required="required">
                </p>

                <p>
                    <label for="Suburb_Town">Suburb/Town</label> 
                    <input type="text" name= "Suburb Town" id="Suburb_Town" maxlength="25" size="20" pattern="^[a-zA-Z\s]+$" title="please enter a valid suburb/town, max 20 chars" required="required">
                </p>

                <label for="State">State</label>
                    <select name="State" id="State" required="required">
                        <option value="" selected="selected">Please Select a State</option>
                        <option value="VIC" >VIC</option>
                        <option value="NSW" >NSW</option>
                        <option value="QLD" >QLD</option>
                        <option value="NT" >NT</option>
                        <option value="WA" >WA</option>
                        <option value="SA" >SA</option>
                        <option value="TAS" >TAS</option>
                        <option value="ACT" >NT</option>
                    </select>

            
                <p>
                    <label for="Postcode">Postcode</label>
                    <input type="text" name= "Postcode" id="Postcode" maxlength="4" size="5" pattern="^[0-9]{4}$" title="please enter a valid Postcode, 4 digits" required="required">
                </p>
            

            </fieldset>

            <!--Wich Product is the customer interested?-->
            <fieldset id="fieldset_Product">
                <legend>Which Products are you interested in? :</legend>
                <label for="Product">Product</label>
                    <select name="Product" id="Product" class="select_option" required="required">
                        <option value="" selected="selected">Please Select a Product</option>
                        <option value="SONY PLAYSTATION VR2" >SONY PLAYSTATION VR2</option>
                        <option value="META Quest 3" >META Quest 3</option>
                        <option value="PICO 4 All-in-One">PICO 4 All-in-One</option>
                        <option value="HTC XR Elite">HTC XR Elite</option>
                    </select>

                <label for="Storage">Storage</label>
                    <select name="Storage" id="Storage" class="select_option" required="required">
                        <option value="" selected="selected">Please Select a Product</option>
                        <option value="128GB" >128GB</option>
                        <option value="256GB" >256GB</option>
                    </select>

                <label for="Colour">Colour</label>
                    <select name="Colour" id="Colour" class="select_option" required="required">
                        <option value="" selected="selected">Please Select a Product</option>
                        <option value="white" >white</option>
                        <option value="black" >black</option>
                    </select>

                    <p>
                        <label for="Quantity">Quantity</label> 
                        <input type="text" name= "Quantity" id="Quantity" maxlength="2" size="1"  title="quantity: 1-99" required="required">
                        
                    </p>

                    <button type="button" id="priceButton">Calculate Price</button>

                    <p>Price: <span id="priceCalc"></span></p>


<!--I'm using drop down list for choosing option, see above
            <p>
                <label for="128_GB">128 GB</label>
                    <input type="checkbox" id="128_GB" name="Options[]" value="128 GB" checked="checked">
                
                    
                <label for="256_GB">256 GB</label>
                    <input type="checkbox" id="256_GB" name="Options[]" value="256 GB">
                    
                
                <label for="white">white</label>
                    <input type="checkbox" id="white" name="Options[]" value="white">

                <label for="black">black</label>
                    <input type="checkbox" id="black" name="Options[]" value="black">    
            </p>
-->
            
            <!--Comment Area-->
            <p>
                <label for="Comment">Comment</label>    
                    Description of Issue <br>
                    <textarea name="Comment" id="Comment" rows="6" cols="40" placeholder="Here you can specify a particular aspect you are interested..."></textarea>
                   
            </p>
            </fieldset>

   
    <input id="submitButton"  type="submit" value="Pay now"> 
    <input type="reset" value="Reset form">
</form>

<?php
    include_once("footer.inc");
?>

<script src="scripts/enquire.js"></script>

</body>

</html>