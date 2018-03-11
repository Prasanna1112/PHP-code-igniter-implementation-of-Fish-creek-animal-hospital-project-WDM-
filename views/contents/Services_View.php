<div class="rightcol">
<p>
<ul>
<?php

foreach ($services as $itr){
   	echo "<li><strong><span>".$itr->servicename."</span></strong><br></li>".$itr->description;
   }
		
?>

	</ul>
</p>
