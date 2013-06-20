
<pre>
<?php
//FILENAME : Maxey_BB1.php
//PROGRAMMER : Mickie Maxey
//PURPOSE : Show departments, call BB2

          extract($_POST); //EXTRACT form
          
          if ($enter == 2)
          {
             printf("<h2>We hope to see you again soon at BB's Online Superstore!!</h2>");
             echo ('<img src="sadface.jpg">');
          }
          else if (empty($username)) //check for username
          {
                 printf("<h2>You did not enter a user name. Please press the BACK button.\n</h2>");
          }

          else
          {
                 $link = mysql_connect("localhost", "root", "caker0921"); //Connect to the database
                 if (!$link)
                    die("Could not connect: " . mysql_error());

                 if (!mysql_select_db("cpt283db"))
                    die("Problem with the database: " . mysql_error());
             
                 $query = "SELECT DISTINCT department FROM products";
                 $result = mysql_query($query);
?>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN"><html>
<head><title>BB Online Superstore</title>
<img src="BBLogo.png"></head>
<body bgcolor = "#71C671">
<font face = "verdana">
<form action = "Maxey_BB2.php" method = "POST">
<h1>BB's Online Superstore</h1>
<fieldset><legend>Please select any department you would like to know more about:</legend>


<?php
    //Start a while loop to process all the rows
    while ($row = mysql_fetch_assoc($result))
      {
        $dept = $row['department'];
?>
        <input type="radio" value= <?php echo $dept;?> name= "dept"><?php echo $dept;
      } //END WHILE
?>
          </fieldset>
          <input type = "submit" value = "SUBMIT">
          <input type = "reset" value = "CLEAR">
          <input type="hidden" name="username" value="<?php echo $username;?>">
          <input type="hidden" name="dep" value="<?php echo $dept;?>">
          </form></font></body></html>

<?PHP
    mysql_close($link); //Close the db connection
}//END ELSE connection

?>
</pre>



