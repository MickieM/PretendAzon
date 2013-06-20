
<pre>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN"><html>
<head><title>BB Online Superstore</title>
<img src="BBLogo.png">'</head>
<body bgcolor = "#71C671">
<font face = "verdana">
<form action = "Maxey_BB4.php" method = "POST">


<?php
//FILE : Maxey_BB3php
//PROG : Mickie Maxey
//PURP : Process check boxes from BB2, display choices, process new selections, sent to bb4

       define("ROOTPW", "caker0921");
       extract($_POST);

       if (!isset($choices))
       {
       printf("No titles selected.\n");
       printf("Please push your back button and choose at least one!\n");
       } //!isset($choices)

       else //Process each checkbox choice
       {
       $link = mysql_connect("localhost", "root", ROOTPW);
       if (!$link)
          die("Could not connect: " . mysql_error());



       if (!mysql_select_db("cpt283db"))
          die("Problem with the database: " . mysql_error());


       printf("<h1>Here are your selections from $department, $username!</h1>");
?>

	<!-- Headers -->
    <table cellspacing="2" cellpadding="2" id="tabid" border='1'>
	<thead>
	<tr>
        <th><strong>Choose</strong></th>
		<th><strong>ITEM ID</strong></th>
        <th><strong>AUTHOR/ARTIST</strong></th>
		<th><strong>TITLE</strong></th>
		<th><strong>PRICE</strong></th>
		<th><strong>IN STOCK</strong></th>
        <th><strong>SUMMARY</strong></th>
	</tr>
	</thead>
	<tbody>


         <?php


         foreach ($choices as $value)
         {
         $query  = "SELECT products.ID, products.entertainerauthor, products.title, prodInv.UnitPrice, prodInv.UnitsInStock,
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
                $stock   = $row['UnitsInStock'];
                $summary = $row['summary'];
                }
     ?>

             <tr>
                <td><input type="checkbox" class="checkbox" id="myc" value="<?php echo $ID;?>" name="choices[]"></td>
                <td><?php echo $ID;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $title;?></td>
                <td><?php echo $price;?></td>
                <td><?php echo $stock;?></td>
                <td><?php echo $summary;?></td>
		     </tr>
    <?php
         } //ENDIF
         else
             printf("Error with the DB result set!\n");
         } //END FOREACH
    ?>
     </tbody></table>
          <br />
          <p /><input type = "submit" value = "SUBMIT"><input type = "reset" value = "CLEAR">
          <input type="hidden" name="department" value="<?php echo $department;?>">
          <input type="hidden" name="username" value="<?php echo $username;?>">
          </form>
          <h2>Please check any items that you would like to purchase!</h2>
          </font></body></html>
          <?php
mysql_close($link);
 }//END CONNECTION ELSE
?>
</pre>



