<div class="span12 clearfix">
	<p>Welcome, <span><?php echo $user ?></span>! <!--welcome's session user -->
	<a href="<?php echo $default ?>">logout</a></p>	
</div>
</div>

<div class="span12 clearfix" id="homeResults">
	<p>New Roots Home Evaluation tool is simple. Just put in an address followed by a city, state or zipcode to get property information!</p>

		<?php echo validation_errors(); ?>
		<?php echo form_open('searchInfo/getHomeSearch'); ?>
		<div class="hsearch">
		<h5>Address</h5>
		<input type="text" name="address" value ="<?php echo set_value('address')?>"  placeholder="123 Orange Dr."/>
		</div>
		<div class="hsearch">
		<h5>City, State, or Zip</h5>
		<input type="text" name="citystatezip" value ="<?php echo set_value('citystatezip')?>"  placeholder="12345"/>
		</div>
		<div id="submit"><input type="submit" value ="Submit"/></div>

	</form>



	