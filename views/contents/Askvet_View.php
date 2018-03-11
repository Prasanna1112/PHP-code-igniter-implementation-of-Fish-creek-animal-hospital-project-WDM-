<div class="rightcol">
	<p> <a href="<?php echo base_url(); ?>Contact/contact_view" target="_self">Contact</a> us if you a question that you would like answered here. </p>
	
<?php
	foreach($questions as $itr){
	echo "<dl><dt><span>".$itr->question."</span></dt>	<dd>".$itr->answer."</dd><dl>" ;
}
?>