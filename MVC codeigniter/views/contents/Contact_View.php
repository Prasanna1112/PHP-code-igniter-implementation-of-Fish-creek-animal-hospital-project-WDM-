<div class="rightcol">
	
	<h2> Contact Fish Creek </h2>
	<p> Required fields are marked with an asterik (*). </p>

	<?php 
        $this->load->library('form_validation');
        echo validation_errors(); ?>

		<?php echo form_open('Contact/post_values'); ?>

	  <table>
	   <tr> 
			<td> <label for="name"> *Name: </label> </td>
			<td> <input type="text" name="name" value="<?php echo set_value('name');?>"/> </td> 
	   </tr>
			   
	   <tr>
			<td> <label for="email"> *E-mail: </label> </td>
			<td> <input type="text" name="mail" value="<?php echo set_value('email');?>"/> </td>
	   </tr>
	   
	   <tr>
			<td> <label for="comments"> *Comments: </label> </td>
			<td> <textarea rows="3" cols="25" name="comm" value="<?php echo set_value('comments');?>"/> </textarea> </td>
	   </tr>
	   
	   <tr> <td></td> 
			<td> <input type="submit" name="submit_button" value="Send Now"/> </td>
	   </tr>
	  
	 </table>
	</form>	
	</div>