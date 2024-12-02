<!DOCTYPE html>
<html lang="en">
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <meta name="description" content="VR Headsets"/>
        <meta name="keywords"    content="Details, VR Headsets" />
        <meta name="author"      content="Dominik Leibel" />
        <title>VR Headsets</title>

        <link href="styles/style.css" rel="stylesheet"/>

  </head>

  <body id="homepage">



      <header>

        <?php
        include_once("header.inc");
        include_once("menu.inc");
        ?>
        <h2>Homepage</h2>
      </header>


        <p id="BackgroundGraphicSource"><a href="https://medium.com/visionary-hub/a-new-reality-virtual-reality-78608278013b"> Background Graphic source</a> </p>

        <!--Details about Company-->
        <article id="ArticleHomepage">
          <h2 id="h2_homepage">About us:</h2>
            <p>VR Headsets established in 2022 and we made it our mission to help people,
               <br><strong>so they get what they need!</strong></p>
            <p>We are experts in this field and we offer a variety of prdoucts,
                <br><strong>so everyone get what they need!</strong></p>
            <p>We test all our products and only offer products if we are conviced of them,
                <br><strong>so everyone get what they need!</strong></p>
            <p>So maybe you could read out, that we are focused to satisfy the needs of our customers!</p>
          </article>

<!---Image Map shows delivery time when you hover over the states-->

<div class="ImageMap">
  <h2 id="deliveryTime">Delivery Time:</h2>

  <!--Container: Western Australia-->
  <div id="WA" class="State">
    <p>Western Australia</p>
  </div >

  <!--Container: Northern Territory-->
  <div id="NT" class="State">
    <p>Northern Territory</p>
  </div>

  <!--Container: South Australia-->
  <div id="SA" class="State">
    <p>South Australia</p>
  </div>
  <!--Container: Queensland-->
  <div id="QLD" class="State">
    <p>Queensland</p>
  </div>

  <!--Container: New South Wales-->
  <div id="NSW" class="State">
    <p>New South Wales</p>
  </div>

  <!--Container: Victoria-->
  <div id="VIC" class="State">
    <p>Victoria</p>
  </div>

  <!--Container: Tasmania-->
  <div id="TAS" class="State">
    <p>Tasmania</p>
  </div>

  <!--Container: Delivery Time-->
  <div id="Plane">
    <h3>Delivery Time:</h3>
      <p id="short" class="deliveryTime">1-2 days</p>
      <p id="normal" class="deliveryTime">2-4 days</p>
      <p id="medium" class="deliveryTime">4-7 days</p>
      <p id="long" class="deliveryTime">6-12 days</p>
  </div>

</div>


  <!--Footer-->
<?php
 include_once("footer.inc");
?>

</body>



</html>