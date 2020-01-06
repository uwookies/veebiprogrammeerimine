<?php
  require("functions_main.php");
  require("../../../../config.php");
  require("functions_user.php");
  require("functions_message.php");
  $database = "if19_martten_mi_1";
  
  //kui pole sisseloginud
  if(!isset($_SESSION["userId"])){
	  //siis jõuga sisselogimise lehele
	  header("Location: myindex.php");
	  exit();
  }
  
  //väljalogimine
  if(isset($_GET["logout"])){
	  session_destroy();
	  header("Location: myindex.php");
	  exit();
  }
  
  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
  
  $notice = null;
  
  if(isset($_POST["submitMessage"])){
      if(!empty(test_input($_POST["message"]))){
        $notice = storeMessage(test_input($_POST["message"]));
      }else{
        $notice = "tuhja sonumit ei salvesta";
      }
  }

  //$messageHTML = readAllMessages();
  $messageHTML = readMyMessages();

  require("header.php");
?>
<body>
  <?php
    echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames
  ja ei sisalda tõsiseltvõetavat sisu!</p>
  <hr>
  <p><a href="?logout=1">Logi välja!</a> | Tagasi <a href="home.php">avalehele</a></p>
  
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <label>Minu sõnum</label><br>
	  <textarea rows="5" cols="50" name="message" placeholder="Lisa siia oma sõnum ..."></textarea>
	  <br>
	  <input name="submitMessage" type="submit" value="Salvesta sõnum"><span><?php echo $notice; ?></span>
	</form>
  <h2>Senised sõnumid</h2>
	<?php
	  echo $messageHTML;
	?>
  
</body>
</html>





