<pre>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN"><html>
<head><title>BB Online Superstore</title>
<img src="BBLogo.png"></head>
<body bgcolor = "#71C671">
<font face = "verdana">
<form action = "Maxey_BB5.php" method = "POST">

<!--FILE : Maxey_BB4php
//PROG : Mickie Maxey
//PURP : Process check boxes from BB3 display choices, process new selections, sent to bb5 --->
<?php

       define("ROOTPW", "caker0921");
       extract($_POST);

       if (!isset($choices))
       {
       printf("No titles selected. ");
       printf("Please push your back button and choose at least one, or press the home button.\n");
?>
       <form><input type="button" value="HOME" onClick="window.location.href='Maxey_fp.html'"></form>
<?php
       } //!isset($choices)

       else //Process each checkbox choice
       {
       $link = mysql_connect("localhost", "root", ROOTPW);
       if (!$link)
          die("Could not connect: " . mysql_error());



       if (!mysql_select_db("cpt283db"))
          die("Problem with the database: " . mysql_error());

       printf("<h1>Here are your purchases from $department, $username!</h1>");
?>
       
       <!-- Headers -->
    <table cellspacing="2" cellpadding="2" id="tabid" border='1'>
	<thead>
	<tr>
        <th><strong>AUTHOR/ARTIST</strong></th>
		<th><strong>TITLE</strong></th>
		<th><strong>PRICE</strong></th>
        <th><strong>SUMMARY</strong></th>

	</tr>
	</thead>
	<tbody>
 
<?php

         $total = 0;
         foreach ($choices as $value)
         {
         $query  = "SELECT products.ID, products.entertainerauthor, products.title, prodInv.UnitPrice,
                  products.summary FROM products INNER JOIN prodInv ON products.ID = prodinv.ID WHERE products.ID = '$value' ORDER BY entertainerauthor";
         $result = mysql_query($query);

           if ($result)
           {
               $row = mysql_fetch_assoc($result);
               {
                $ID      = $row['ID'];
                $name    = $row['entertainerauthor'];
                $title   = $row['title'];
                $price   = $row['UnitPrice'];
                $summary = $row['summary'];
                $total += $price;
                }

?>

             <tr>
                <td><?php echo $name;?></td>
                <td><?php echo $title;?></td>
                <td><?php echo $price;?></td>
                <td><?php echo $summary;?></td>
		     </tr>

<?php

         } //ENDIF
         else
             printf("Error with the DB result set!\n");
             

         } //END FOREACH
         printf("<h2>Your total is: $total</h2>");
?>
          </tbody></table><br />
          
          <fieldset><legend>Payment Information</legend>
          Name:<input type = "text" name = "username"  />
          Address:<input type = "text" name = "address" />
          Card Type:<input type = "text" name = "card" />
          Card Number:<input type =  "text" name = "number" maxlength = "16"/>
          </font>
          
          <input type = "submit" value = "SUBMIT"><input type = "reset" value = "CLEAR">
          <input type="hidden" name="username" value="<?php echo $username;?>">
          </form></body></html>
<?php

mysql_close($link);
}//END CONNECTION ELSE
?>
</pre>





