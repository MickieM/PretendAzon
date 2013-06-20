<pre>
<?php
//FILE : Maxey_BB5.php
//PROG : Mickie Maxey
//PURP : Display receipt

  extract($_POST);
  
  if(empty ($address))
            echo("No address entered!! Please press the BACK button.");
  else if (empty ($card))
          echo("No credit card type entered! Please press the BACK button.");
  else if (empty ($number))
          echo("No credit card number entered! Please press the BACK button.");
  else if (strlen($number) < 16)
          echo("Invalid credit card number, must be 16 digits. Please press the BACK button.");
                  
  else
  {
  $last4 = substr($number,-4,4);

?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN"><html>
<head><title>BB Online Superstore</title>
<img src="BBLogo.png"></head>
<body bgcolor = "#71C671">
<font face = "verdana">
<form action = "Maxey_BB1.php" method = "POST">

         <fieldset><legend><h1>Thank you for your purchase!</h1></legend>

         <h2>Name:   <?php echo $username;?></h2>
         <h2>Address:   <?php echo $address;?></h2>
         <h2>Last 4 digits: <?php echo $last4;?></h2>
         </fieldset>
         <?php echo ("<h3>Your $card card has been approved!<h3>");?>
         <h3>Your items will ship soon.</h3>
         <h3>Please print this receipt for your records</h3>
         
  

 <input type = "submit" value = "BACK TO HOME">
 <input type="hidden" name="username" value="<?php echo $username;?>">
 <input type="hidden" name="enter" value="1">
 </form>
  
  </font></html></pre>
<?php
}//END ELSE
?>
