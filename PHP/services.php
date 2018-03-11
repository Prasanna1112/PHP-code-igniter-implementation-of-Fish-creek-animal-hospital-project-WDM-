<?php
include ("conn.php");
?>

<html>
 <head>
	<link rel="stylesheet" type="text/css" href="fishcreek.css">
 </head>
 <div class="body">
   <body id="wrapper"> 
	<h1> Fish Creek Animal Hospital </h1>
	
	 <div class="leftcol">
	  <nav>
	   <table>
	    <tr> <td> <a href="index.php">Home</a> </td> </tr> 	
	    <tr> <td> <a href ="services.php">Services</a> </td> </tr> 
	    <tr> <td> <a href ="askvet.php">Ask the Vet</a> </td> </tr> 
	    <tr> <td> <a href ="subscribe.php">Subscribe</a> </td> </tr> 
	    <tr> <td> <a href ="contact.php">Contact</a> </td> </tr> 
	   </table>
	  </nav>
	 </div>
	
	<div class="rightcol">
	<p>
	<ul>
<?php
	
	$output=mysqli_query($db,"select * from service");
	$service_arr = array();
	$service_arr_desc = array();
	$number_of_rows = mysqli_num_rows($output);

	while($row = mysqli_fetch_assoc($output))
	{	
    array_push($service_arr, $row["servicename"]);
    array_push($service_arr_desc, $row["description"]);
	}
	for ($i = 0; $i < $number_of_rows; $i++ ){
	echo "<li><strong><span>".$service_arr[$i]."</span></strong><br></li>".$service_arr_desc[$i] ;
	}
?>

	</ul>
	</p>
	
	<footer>
	<p> Copyright &copy; 2016 Fish Creek Animal Hospital <br/> <a href="mailto:prasu.01dmg@gmail.com" target:"_self">  prasanna@dhamgaye.com  </a>
	</p>
	</footer>
	
	</div>
	</body>
 </div>

</html>