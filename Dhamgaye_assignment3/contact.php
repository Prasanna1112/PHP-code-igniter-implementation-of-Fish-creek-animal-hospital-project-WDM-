<?php
include ("conn.php");


if(isset($_POST["submit_button"]))
{
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['mail']);
    $comments = mysqli_real_escape_string($db, $_POST['comm']);
    $sql = "insert into contact(comments,email,name) values('$comments','$email','$name')";
    if(empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["comm"]))
    {
        echo '<script language="javascript">';
        echo 'alert("Fields marked with * cannot be empty.")';
        echo '</script>';
    }

    elseif (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === false) {
        echo '<script language="javascript">';
        echo 'alert("Invalid email id. Please enter valid wmail id.")';
        echo '</script>';
    }

    else
    {
        mysqli_query($db,$sql);
        header("location: index.php");
    }
}
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
	
	<h2> Contact Fish Creek </h2>
	<p> Required fields are marked with an asterik (*). </p>
	 <form action="contact.php" method="post">
	  <table>
	   <tr> 
			<td> <label for="name"> * Name: </label> </td>
			<td> <input type="text" name="name" > </td> 
	   </tr>
			   
	   <tr>
			<td> <label for="email"> * E-mail: </label> </td>
			<td> <input type="text" name="mail" > </td>
	   </tr>
	   
	   <tr>
			<td> <label for="comments"> * Comments: </label> </td>
			<td> <textarea rows="3" cols="25" name="comm" > </textarea> </td>
	   </tr>
	   
	   <tr> <td></td> 
			<td> <input type="submit" name="submit_button" value="Send Now"/> </td>
	   </tr>
	  
	 </table>
	</form>	
	</div>
	</body>
</html>