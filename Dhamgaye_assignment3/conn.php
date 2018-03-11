<?php
$db = mysqli_connect("127.0.0.1", "root", "","vet");
if(!$db)
{
	die( "Cannot connect to the database" . mysqli_error());
}
?>