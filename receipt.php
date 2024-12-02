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

        
        <h1>Receipt</h1>
        
        <?php
        session_start();

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
    
            if(isset($_SESSION["card_number"])){
            $card_number = $_SESSION["card_number"];
            }else{
                header("location: enquire.php");
            }

            if(isset($_SESSION["credit_card_type"])){
            $credit_card_type = $_SESSION["credit_card_type"];
            }else{
            header("location: enquire.php");
            }

            if(isset($_SESSION["name_on_credit_card"])){
            $name_on_credit_card = $_SESSION["name_on_credit_card"];
            }else{
            header("location: enquire.php");
            }

            if(isset($_SESSION["vcc"])){
            $vcc = $_SESSION["vcc"];
            }else{
            header("location: enquire.php");
            }

            if(isset($_SESSION["cvv"])){
            $cvv = $_SESSION["cvv"];
            }else{
            header("location: enquire.php");
            }

            if(isset($_SESSION["order_id"])){
            $order_id = $_SESSION["order_id"];
            }else{
            header("location: enquire.php");
        }

        if(isset($_SESSION["order_time"])){
        $order_time = $_SESSION["order_time"];
        }else{
        header("location: enquire.php");
        }

        if(isset($_SESSION["order_status"])){
        $order_status = $_SESSION["order_status"];
        }else{
        header("location: enquire.php");
        }


        $expected_referrer = "https://mercury.swin.edu.au/cos60004/s105323278/assign3/payment.php";

        if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] !== "$expected_referrer") {
            header("location: enquire.php"); 
            } else {
        echo "<p><a href=index.php>back to website</a></p>";
        echo'<div id="receiptContainer">
                <div id="customerAddress"> 
                    <p> <strong> Delivery address of customer: </strong></p>
                    <p> '.$first_name.', '.$last_name.'</p>
                    <p> '.$street_address.', '.$postcode.', '.$suburb_town.', '.$state.'</p>
                    <p> &#9743; '.$phone_number.'</p>
                </div>

                <div id="contact"> 
                    <p><strong> Preffered way of contact: </strong>'.$preferred_contact.'</p>
                    <p> '.$email.'</p>
                    <p>&#9743; '.$phone_number.'</p>
                </div>


                <div id="orderDetails"> 
                    <p> <strong> Comment for order:</strong></p>
                    <article> "'.$comment_field.'" </article>
                    <hr></hr>
                    <p> <strong>Order details:</strong></p>
                    <hr></hr>
                    <p> <strong>Product: </strong>'.$product.'</p>
                    <p> <strong>Features: </strong>'.$product_features.'</p>
                    <p> <strong>Quantity: </strong>'.$product_quantity.'</p>
                </div>

                <div id="orderStatus">
                    <p><strong>Order-ID: </strong>'.$order_id.'</p>
                    <p><strong>Order Time: </strong>'.$order_time.'</p>
                    <p><strong> Order Status: </strong>'.$order_status.'</p>
                    <p><strong> Payed by: </strong> '.$name_on_credit_card.' </p>
                    <p><strong> Credit Card details: </strong>'.$credit_card_type.': '.$card_number.' </p> 
                </div>

                <div id="price"> 
                    <hr></hr>
                    <p> <strong>total Price: </strong>'.$product_price.' $</p>
                </div>
            </div>';
            }
            session_unset();
            session_destroy();
        ?>
    </body>
</html>