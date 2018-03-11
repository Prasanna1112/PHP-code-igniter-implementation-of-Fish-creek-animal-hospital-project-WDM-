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
	
	<h2> Subscribe Fish Creek </h2>
	<p> Required fields are marked with an asterik (*). </p>
	 <form action="subscribe.php" method="post">
	  <table>
	   <tr> 
			<td> <label for="client_name"> *Client Full Name: </label> </td>
			<td> <input type="text" name="clientname" > </td> 
	   </tr>
		
	   <tr>
			<td> <label for="addrs"> *Address: </label> </td>
			<td> <input type="text" name="add" > </td>
	   </tr>
	   
	   <tr>
			<td> <label for="email"> *E-mail: </label> </td>
			<td> <input type="text" name="mail"> </td>
	   </tr>
	   
	   <tr> 
			<td> <label for="ph#"> *Phone: </label> </td>
			<td> <input type="text" name="ph"> </td> 
	   </tr>
	   
	   <tr> 
			<td> <label for="passw"> *Password: </label> </td>
			<td> <input type="password" name="pswd"> </td> 
	   </tr>
	   
	   <tr>
			<td> <label for="service_type"> *Type of Service: </label> </td>
			<td>
			<?php

				$servicesql="select * from service";
				$serviceoutput = mysqli_query($db,$servicesql);
				$service_arr = array();
				$number_of_service_rows = mysqli_num_rows($serviceoutput);

				while($row1 = mysqli_fetch_assoc($serviceoutput))
				{
	
				array_push($service_arr, $row1["servicename"]);	
	
				}
				echo '<select name = "service_name">' ;
				for ($i = 0; $i < $number_of_service_rows; $i++ ){
				echo "<option>".$service_arr[$i]."</option>";
				}
				echo "</select>"

			?>
			</td>


	   </tr>
	   
	   <tr>
			<td> <label for="pet"> *Pet: </label> </td>
			<td><?php

				$petsql="select * from pet";
				$petoutput=mysqli_query($db,$petsql);
				$pet_arr = array();
				$number_of_pet_rows = mysqli_num_rows($petoutput);

				while($row2 = mysqli_fetch_assoc($petoutput))
				{
				array_push($pet_arr, $row2["petname"]);		
				}

				echo '<select name = "pet_name">' ;
				for ($i = 0; $i < $number_of_pet_rows; $i++ ){
				echo "<option>".$pet_arr[$i]."</option>";
				}
				echo "</select>"

			?> 
			</td>
	   </tr>
	   
	   <tr> <td></td>
			<td> <input type="submit" name="submit_button" value="Send Now"/>
           </td>
      </tr>
	 </table>
	</form>	
	
<?php

	$service= "Medical Services";
	$pet= "Dog";

	if(isset($_POST['service_name'])){
	$service = $_POST['service_name'];
	}
	if(isset($_POST['pet_name'])){
	$pet = $_POST['pet_name'];
	}

	$sql1 = "select serviceid from service where servicename = '$service'";
	$output1 = mysqli_query($db,$sql1);
	$row1 = mysqli_fetch_array($output1,MYSQLI_ASSOC);
	$serviceidnum = $row1['serviceid'];

	$sql2 = "select petid from pet where petname = '$pet' ";
	$output2 = mysqli_query($db,$sql2);
	$row2 = mysqli_fetch_array($output2,MYSQLI_ASSOC);
	$petidnum = $row2['petid'];

	if(isset($_POST['submit_button']))
	{
	$name = $_POST['clientname'];
	$address = $_POST['add'];
	$email = $_POST['mail'];
	$ph = $_POST['ph'];
	$pwd = $_POST['pswd'];
	
	$service = $_POST['service_name'];
	$pet = $_POST['pet_name'];
	
		if(empty($name) && empty($address) && empty($email) && empty($ph) && empty($pwd))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Fields marked with * must be entered!');";
			echo "</script>";
		}
		else if(empty($name))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Name must be entered!');";
			echo "</script>";
			}
		else if(empty($address))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Address must be entered!');";
			echo "</script>";
		}
		else if(empty($email))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Email id must be entered!');";
			echo "</script>";
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Invalid email id! Please enter the valid email id!');";
			echo "</script>";
		}

		else if(empty($ph))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Phone number must be entered!');";
			echo "</script>";
		}
		
		else if(!preg_match("/^[0-9]{10}$/", $ph))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Phone number must contain only 10 numbers!');";
			echo "</script>";
		}

		else if(empty($pwd))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Password must be entered!');";
			echo "</script>";
		}
		else if (strlen($pwd) < '8') 
		{
			echo "<script type='text/javascript'>";
			echo "alert('Password must contain at least 8 characters!');";
			echo "</script>";
		}

		else if (strlen($pwd) > '16') 
		{
			echo "<script type='text/javascript'>";
			echo "alert('Password must not be more than 16 characters!');";
			echo "</script>";		   
		}

		elseif(!preg_match("#[0-9]+#",$pwd)) {
			echo "<script type='text/javascript'>";
			echo "alert('Password must contain at least 1 number!');";
			echo "</script>";
		}
		elseif(!preg_match("#[A-Z]+#",$pwd)) {
			echo "<script type='text/javascript'>";
			echo "alert('Password must contain at least 1 uppercase character!');";
			echo "</script>";
		}
		elseif(!preg_match("#[a-z]+#",$pwd)) {
			echo "<script type='text/javascript'>";
			echo "alert('Password must contain at least 1 lowercase character!');";
			echo "</script>";
		}
		
	else{
		
		$pwd = md5($pwd);
	// Database transaction

	$sql = "select clientid from client where email ='$email'";	
	$output = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($output,MYSQLI_ASSOC);

	$sql_email = "select email from client where email = '$email'";
	$result_email= mysqli_query($db,$sql_email);
	$row_email = mysqli_fetch_array($result_email,MYSQLI_ASSOC);

	if ($row_email['email'] != $email)
	{
		$sql3 = " insert into client(address,email,name,password,phone) values('$address','$email','$name','$pwd','$ph') ";
		$output3 = mysqli_query($db,$sql3);

		$sql4 = "select clientid from client where email = '$email'";
		$output4 = mysqli_query($db,$sql4);
		$row4 = mysqli_fetch_array($output4,MYSQLI_ASSOC);
		$clientidnum = $row4['clientid'];

		$sql5 = "insert into subscription(clientid,serviceid,petid,date) values($clientidnum,$serviceidnum,$petidnum,curdate())";
		$output5 = mysqli_query($db,$sql5);

	}
	else{

		$sql4 = "select clientid from client where email = '$email'";
		$output4 = mysqli_query($db,$sql4);
		$row4 = mysqli_fetch_array($output4,MYSQLI_ASSOC);
		$clientidnum = $row4['clientid'];

		$sql5 = "insert into subscription(clientid,serviceid,petid,date) values($clientidnum,$serviceidnum,$petidnum,curdate())";
		$output5 = mysqli_query($db,$sql5);

		}
		}
	}
		
	mysqli_close($db);	
	
?>


	
	<footer>
	<p> Copyright &copy; 2016 Fish Creek Animal Hospital
	<br/> <a href="mailto:prasu.01dmg@gmail.com"> prasanna@dhamgaye.com </a> </p> 
	</footer>

	</div>
	</body>
 </div>	
       
</html>