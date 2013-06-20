<pre>
<?php

//FILENAME : Maxey_BB2.php
//PROGRAMMER : Mickie Maxey
//PURPOSE : Process form and query database, call BB3

          extract($_POST); //EXTRACT form

          if (!isset($dept))
          {
           printf("No department selected.\n");
           printf("Please push your back button and choose at least one!\n");
           } //!isset($dept)

       else //Process each checkbox choice
       {

          $link = mysql_connect("localhost", "root", "caker0921"); //Connect to the database
          if (!$link)
             die("Could not connect: " . mysql_error());

          if (!mysql_select_db("cpt283db"))
             die("Problem with the database: " . mysql_error());
             

//begin heredoc
    print <<<ENDFIRST
<!doctype html public "-//W3C//DTD HTML 4.0 //EN"><html>
<head><img src="BBLogo.png">
<title>BB Online Superstore</title>
</head>
<body bgcolor = "#71C671">
<font face = "verdana">
<form action = "Maxey_BB3.php" method = "POST">
ENDFIRST;
    //end heredoc
    
?>
    <h1>BB's Online Superstore</h1>
    <h2>Here are the products in <?php echo $dept, ", ", $username; ?><h2>
    <h3>Please check any items you are interested in:<h3>
    <table cellspacing="2" cellpadding="2" id="tabid" border='1'>
    <thead>
    <tr>
    <th><strong>Choose</strong></th>
    <th><strong>ID Number</strong></th>
    <th><strong>AUTHOR/ARTIST</strong></th>
    <th><strong>Title</strong></th>
    <th><strong>Media</strong></th>
    <th><strong>Feature</strong></th>
    </tr>
    </thead>
    <tbody>

<?php

    $query = "SELECT * FROM products WHERE department = '$dept' ORDER BY entertainerauthor";

    $result = mysql_query($query);

    //Start a while loop to process all the rows
    while ($row = mysql_fetch_assoc($result))
      {
        $ID                = $row['ID'];
        $entertainerauthor = $row['entertainerauthor'];
        $title             = $row['title'];
        $media             = $row['media'];
        $feature           = $row['feature'];
        
?>
        
          <tr>
		        <td><input type="checkbox" class="checkbox" id="myc" value="<?php echo $ID;?>" name="choices[]"></td>
		        <td><?php echo $ID;?></td>
		        <td><?php echo $entertainerauthor;?></td>
		        <td><?php echo $title;?></td>
		        <td><?php echo $media;?></td>
		        <td><?php echo $feature;?></td>
	      </tr>
 <?php

      } //END WHILE
?>
          </tbody></table>
          </font><p /><input type = "submit" value = "SUBMIT"><input type = "reset" value = "CLEAR">
          <input type="hidden" name="department" value="<?php echo $dept;?>">
          <input type="hidden" name="username" value="<?php echo $username;?>">
          </form></body></html>

<?PHP
    mysql_close($link); //Close the db connection
}//end else connection
?>

</pre>


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
