<?php
  require("functions_main.php");
  require("../../../../config.php");
  require("functions_user.php");
  $database = "if19_martten_mi_1";
  
  //kontrollime, kas on sisse loginud
  if(!isset($_SESSION["userId"])){
	header("Location: myindex.php");
	exit();
  }
  
  //väljalogimine
  if(isset($_GET["logout"])){
	  //sessioon kinni
	  session_unset();
	  session_destroy();
	  header("Location: myindex.php");
	  exit();
  }
  
  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
  
  require("header.php");
?>
<body>
<?php
  echo "<h1>" .$userName .", veebiprogrammeerimine 2019</h1>";
  ?>
  <p>See veebileht on valminud õppetöö käigus ning ei sisalda mingisugust tõsiseltvõetavat sisu!</p>
  <hr>
  <p>Olete sisseloginud! Logi <a href="?logout=1">välja</a>!</p>
    <ul>
    <li><a href="userprofile.php">Kasutajaprofiil</a></li>
    <li><a href="messages.php">Sõnumid</a></li>
    <li><a href="photoupload.php">photod</a></li>
    <li><a href="gallery.php">pildigaleri</a></li>
  </ul>

</body>
</html>