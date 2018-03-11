<?php
include ("conn.php");
?>

<html>   
 <head>
	<link rel="stylesheet" type="text/css" href="fishcreek.css">
 </head>
 </html>
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
	<p> <a href="contact.php" target="_self">Contact</a> us if you a question that you would like answered here. </p>
	
<?php
	$output = mysqli_query($db,"select * from questions");
	$que_array = array();
	$que_array_desc = array();
	$num_of_rows = mysqli_num_rows($output);

	while($row = mysqli_fetch_assoc($output))
{	
    array_push($que_array, $row["question"]);
    array_push($que_array_desc, $row["answer"]);
	 
}
	for ($i = 0; $i < $num_of_rows; $i++ ){
	echo "<dl><dt><span>".$que_array[$i]."</span></dt>	<dd>".$que_array_desc[$i]."</dd><dl>" ;
}
?>

	<footer>
	<p> Copyright &copy; 2016 Fish Creek Animal Hospital 
	<br/> <a href="mailto:prasu.01dmg@gmail.com"> prasanna@dhamgaye.com </a> </p> 
	</footer>
	
	</div>
	</body>
 </div>
	
</html>