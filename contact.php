
<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    $loggedin = false;
} else {
    $loggedin = true;
}
?>

<!DOCTYPE html>
<html>
<title>Contact Us</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
  background-color: #00b4e6;
}


.hehe{
    z-index: 1;
    opacity: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
a{
    color: white;
}
</style>
<body>



<?php include "navbar.php";?>





<!-- Contact Section -->
<p id="top" ></p>
<div class="w3-container" style="padding:98px 16px" id="contact">
  <h3  class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
  <div style="margin-top:48px">
    <!-- <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Indore, MP</p>
    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +00 151515</p>
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: LifeEnjoy985@mail.com</p>
    <br> -->
    <form action="submit.php" target="_blank" method="post">
      <p><input class="w3-input w3-border"  name ="name" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-border"  name ="email" type="email" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-border"  name ="subject" type="text" placeholder="Subject" required name="Subject"></p>
      <p><textarea class="w3-input w3-border " name ="message"  type="text" placeholder="Message" required name="Message" rows='4' column=""></textarea></p>
      <p>
        <button class="w3-button w3-black " type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
    
  </div>
</div>

<?php include "footer.php";?>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
          function my1(){
              document.getElementById("alert").style.display='none';
          }
      
</script>

</body>
</html>

