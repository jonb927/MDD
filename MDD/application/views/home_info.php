<div class="span12 clearfix">
	<p>Welcome, <span><?php echo $user ?></span>! <!--welcome's session user -->
	<a href="<?php echo $default ?>">logout</a></p>	
</div>
</div>

<div class="span12 clearfix">
	<p>New Roots Home Evaluation tool is simple. Just put in an address followed by a city, state or zipcode to get property information!</p>
</div>
	
		<?php echo validation_errors(); ?>
		<?php echo form_open('searchInfo/getHomeSearch'); ?>

		<h5>Address</h5>
		<input type="text" name="address" value ="<?php $this->input->post('address')?>"  placeholder="123 Orange Dr."/>
		<h5>Choose city, state, or zip</h5>
		<input type="text" name="citystatezip" value ="<?php $this->input->post('citystatezip')?>"  placeholder="12345"/>
		<div><input type="submit" value ="Submit"/></div>
	</form>


	