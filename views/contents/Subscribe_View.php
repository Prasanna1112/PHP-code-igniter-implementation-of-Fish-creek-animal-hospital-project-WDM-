<div class="rightcol">
	
	<h2> Subscribe Fish Creek </h2>
	<p> Required fields are marked with an asterik (*). </p>
	
	<?php 
        $this->load->library('form_validation');
        echo validation_errors(); 
        ?>

		<?php echo form_open('Subscribe/validation'); ?>

	  <table>
	   <tr> 
			<td> <label for="client_name"> *Client Full Name: </label> </td>
			<td> <input type="text" name="clientname" value="<?php echo set_value('clientname'); ?>" > </td> 
	   </tr>
		
	   <tr>
			<td> <label for="addrs"> *Address: </label> </td>
			<td> <input type="text" name="add" value="<?php echo set_value('add'); ?>" > </td>
	   </tr>
	   
	   <tr>
			<td> <label for="email"> *E-mail: </label> </td>
			<td> <input type="text" name="mail" value="<?php echo set_value('mail'); ?>"> </td>
	   </tr>
	   
	   <tr> 
			<td> <label for="ph#"> *Phone: </label> </td>
			<td> <input type="text" name="ph" value="<?php echo set_value('ph'); ?>"> </td> 
	   </tr>
	   
	   <tr> 
			<td> <label for="passw"> *Password: </label> </td>
			<td> <input type="password" name="pswd" value="<?php echo set_value('pswd'); ?>"> </td> 
	   </tr>
	   
	   <tr>
			<td> <label for="service_type"> *Type of Service: </label> </td>
			<td>
			<?php
			    echo '<select name = "service_name">';
				foreach($services as $itr){
				echo "<option>".$itr->servicename."</option>";
			}
			?>
			</td>


	   </tr>
	   
	   <tr>
			<td> <label for="pet"> *Pet: </label> </td>
			<td>
				<?php
				echo '<select name = "pet_name">';
					foreach($pets as $itr){
					echo "<option>".$itr->petname."</option>";
			}
				
				?>
			</td>
	   </tr>
	   
	   <tr> <td></td>
			<td> <input type="submit" name="submit_button" value="Send Now"/>
           </td>
      </tr>
	 </table>
	</form>	
	
